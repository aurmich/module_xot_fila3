<?php

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;

class AnalyzeQueryPerformance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xot:analyze-queries 
                            {route? : The route to analyze}
                            {--all : Analyze all routes}
                            {--threshold=100 : Minimum query time in ms to report}
                            {--limit=20 : Maximum number of queries to display}
                            {--group : Group similar queries}
                            {--format=table : Output format (table, json)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Analyze database query performance for a specific route or all routes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $route = $this->argument('route');
        $all = $this->option('all');
        $threshold = $this->option('threshold');
        $limit = $this->option('limit');
        $group = $this->option('group');
        $format = $this->option('format');

        if (!$route && !$all) {
            $this->error('Please specify a route or use --all option.');
            return 1;
        }

        if ($all) {
            return $this->analyzeAllRoutes($threshold, $limit, $group, $format);
        }

        return $this->analyzeRoute($route, $threshold, $limit, $group, $format);
    }

    /**
     * Analyze a specific route.
     *
     * @param string $route
     * @param int $threshold
     * @param int $limit
     * @param bool $group
     * @param string $format
     * @return int
     */
    protected function analyzeRoute($route, $threshold, $limit, $group, $format)
    {
        $this->info("Analyzing queries for route: {$route}");
        
        // Enable query logging
        DB::enableQueryLog();
        
        // Clear existing query log
        DB::flushQueryLog();
        
        try {
            // Make a request to the route
            $this->call('route:call', ['uri' => $route]);
            
            // Get the query log
            $queries = DB::getQueryLog();
            
            // Analyze the queries
            $this->analyzeQueries($queries, $threshold, $limit, $group, $format);
            
            return 0;
        } catch (\Exception $e) {
            $this->error("Error analyzing route: {$e->getMessage()}");
            return 1;
        }
    }

    /**
     * Analyze all routes.
     *
     * @param int $threshold
     * @param int $limit
     * @param bool $group
     * @param string $format
     * @return int
     */
    protected function analyzeAllRoutes($threshold, $limit, $group, $format)
    {
        $routes = Route::getRoutes();
        $routeCount = count($routes);
        
        $this->info("Analyzing queries for {$routeCount} routes...");
        
        $bar = $this->output->createProgressBar($routeCount);
        $bar->start();
        
        $allQueries = [];
        $routeData = [];
        
        foreach ($routes as $route) {
            $uri = $route->uri();
            
            // Skip routes with parameters
            if (strpos($uri, '{') !== false) {
                $bar->advance();
                continue;
            }
            
            // Enable query logging
            DB::enableQueryLog();
            
            // Clear existing query log
            DB::flushQueryLog();
            
            try {
                // Make a request to the route
                $this->callSilently('route:call', ['uri' => $uri]);
                
                // Get the query log
                $queries = DB::getQueryLog();
                
                if (count($queries) > 0) {
                    $routeData[$uri] = [
                        'query_count' => count($queries),
                        'total_time' => array_sum(array_column(array_map(function ($query) {
                            return ['time' => $query['time']];
                        }, $queries), 'time')),
                    ];
                    
                    $allQueries = array_merge($allQueries, array_map(function ($query) use ($uri) {
                        $query['route'] = $uri;
                        return $query;
                    }, $queries));
                }
            } catch (\Exception $e) {
                // Ignore errors
            }
            
            $bar->advance();
        }
        
        $bar->finish();
        $this->newLine(2);
        
        // Sort routes by total query time
        uasort($routeData, function ($a, $b) {
            return $b['total_time'] <=> $a['total_time'];
        });
        
        // Display route summary
        $this->info('Route Summary (Top 10 by total query time):');
        $this->newLine();
        
        $table = new Table($this->output);
        $table->setHeaders(['Route', 'Query Count', 'Total Time (ms)', 'Avg Time (ms)']);
        
        $i = 0;
        foreach ($routeData as $uri => $data) {
            if ($i++ >= 10) break;
            
            $table->addRow([
                $uri,
                $data['query_count'],
                number_format($data['total_time'], 2),
                number_format($data['total_time'] / $data['query_count'], 2),
            ]);
        }
        
        $table->render();
        $this->newLine();
        
        // Analyze all queries
        $this->analyzeQueries($allQueries, $threshold, $limit, $group, $format);
        
        return 0;
    }

    /**
     * Analyze queries and display results.
     *
     * @param array $queries
     * @param int $threshold
     * @param int $limit
     * @param bool $group
     * @param string $format
     * @return void
     */
    protected function analyzeQueries($queries, $threshold, $limit, $group, $format)
    {
        if (empty($queries)) {
            $this->info('No queries executed.');
            return;
        }
        
        $this->info(sprintf('Found %d queries.', count($queries)));
        
        // Filter queries by threshold
        $queries = array_filter($queries, function ($query) use ($threshold) {
            return $query['time'] >= $threshold;
        });
        
        if (empty($queries)) {
            $this->info(sprintf('No queries exceeded the threshold of %d ms.', $threshold));
            return;
        }
        
        $this->info(sprintf('Found %d queries that exceeded the threshold of %d ms.', count($queries), $threshold));
        
        if ($group) {
            $this->displayGroupedQueries($queries, $limit, $format);
        } else {
            $this->displayQueries($queries, $limit, $format);
        }
        
        // Analyze for N+1 problems
        $this->analyzeForNPlusOne($queries);
    }

    /**
     * Display queries.
     *
     * @param array $queries
     * @param int $limit
     * @param string $format
     * @return void
     */
    protected function displayQueries($queries, $limit, $format)
    {
        // Sort queries by time (descending)
        usort($queries, function ($a, $b) {
            return $b['time'] <=> $a['time'];
        });
        
        // Limit the number of queries to display
        $queries = array_slice($queries, 0, $limit);
        
        if ($format === 'json') {
            $this->line(json_encode($queries, JSON_PRETTY_PRINT));
            return;
        }
        
        $table = new Table($this->output);
        $table->setHeaders(['#', 'Query', 'Time (ms)', 'Route']);
        
        foreach ($queries as $i => $query) {
            $sql = $query['query'];
            $bindings = $query['bindings'];
            
            // Replace bindings in the query
            foreach ($bindings as $binding) {
                $value = is_numeric($binding) ? $binding : "'{$binding}'";
                $sql = preg_replace('/\?/', $value, $sql, 1);
            }
            
            $table->addRow([
                $i + 1,
                $sql,
                number_format($query['time'], 2),
                $query['route'] ?? 'N/A',
            ]);
            
            if ($i < count($queries) - 1) {
                $table->addRow(new TableSeparator());
            }
        }
        
        $table->render();
    }

    /**
     * Display grouped queries.
     *
     * @param array $queries
     * @param int $limit
     * @param string $format
     * @return void
     */
    protected function displayGroupedQueries($queries, $limit, $format)
    {
        $groupedQueries = [];
        
        foreach ($queries as $query) {
            $sql = $query['query'];
            
            // Normalize the query by removing specific values
            $normalizedSql = preg_replace('/\s+/', ' ', $sql);
            $normalizedSql = preg_replace('/\'[^\']*\'/', '?', $normalizedSql);
            $normalizedSql = preg_replace('/\d+/', '?', $normalizedSql);
            
            if (!isset($groupedQueries[$normalizedSql])) {
                $groupedQueries[$normalizedSql] = [
                    'count' => 0,
                    'total_time' => 0,
                    'min_time' => PHP_INT_MAX,
                    'max_time' => 0,
                    'avg_time' => 0,
                    'example' => $sql,
                    'routes' => [],
                ];
            }
            
            $groupedQueries[$normalizedSql]['count']++;
            $groupedQueries[$normalizedSql]['total_time'] += $query['time'];
            $groupedQueries[$normalizedSql]['min_time'] = min($groupedQueries[$normalizedSql]['min_time'], $query['time']);
            $groupedQueries[$normalizedSql]['max_time'] = max($groupedQueries[$normalizedSql]['max_time'], $query['time']);
            
            if (isset($query['route']) && !in_array($query['route'], $groupedQueries[$normalizedSql]['routes'])) {
                $groupedQueries[$normalizedSql]['routes'][] = $query['route'];
            }
        }
        
        // Calculate average time
        foreach ($groupedQueries as &$group) {
            $group['avg_time'] = $group['total_time'] / $group['count'];
        }
        
        // Sort by total time (descending)
        uasort($groupedQueries, function ($a, $b) {
            return $b['total_time'] <=> $a['total_time'];
        });
        
        // Limit the number of groups to display
        $groupedQueries = array_slice($groupedQueries, 0, $limit);
        
        if ($format === 'json') {
            $this->line(json_encode($groupedQueries, JSON_PRETTY_PRINT));
            return;
        }
        
        $table = new Table($this->output);
        $table->setHeaders(['#', 'Query Pattern', 'Count', 'Total Time (ms)', 'Avg Time (ms)', 'Min Time (ms)', 'Max Time (ms)', 'Routes']);
        
        $i = 0;
        foreach ($groupedQueries as $pattern => $group) {
            $table->addRow([
                ++$i,
                $group['example'],
                $group['count'],
                number_format($group['total_time'], 2),
                number_format($group['avg_time'], 2),
                number_format($group['min_time'], 2),
                number_format($group['max_time'], 2),
                implode(', ', array_slice($group['routes'], 0, 3)) . (count($group['routes']) > 3 ? '...' : ''),
            ]);
            
            if ($i < count($groupedQueries)) {
                $table->addRow(new TableSeparator());
            }
        }
        
        $table->render();
    }

    /**
     * Analyze for N+1 query problems.
     *
     * @param array $queries
     * @return void
     */
    protected function analyzeForNPlusOne($queries)
    {
        $this->info('Analyzing for N+1 query problems...');
        
        $patterns = [];
        $nplusone = [];
        
        foreach ($queries as $query) {
            $sql = $query['query'];
            
            // Look for WHERE clauses with IN or = operators
            if (preg_match('/WHERE\s+([^\s]+)\s+(IN|=)/i', $sql, $matches)) {
                $column = $matches[1];
                $operator = $matches[2];
                
                // Normalize the column name
                $column = preg_replace('/`([^`]+)`/', '$1', $column);
                $column = preg_replace('/([^\.]+)\.([^\.]+)/', '$1.$2', $column);
                
                $key = "{$column}:{$operator}";
                
                if (!isset($patterns[$key])) {
                    $patterns[$key] = [
                        'count' => 0,
                        'queries' => [],
                    ];
                }
                
                $patterns[$key]['count']++;
                $patterns[$key]['queries'][] = $sql;
            }
        }
        
        // Filter for potential N+1 problems (multiple similar queries)
        foreach ($patterns as $key => $pattern) {
            if ($pattern['count'] > 5) {
                $nplusone[$key] = $pattern;
            }
        }
        
        if (empty($nplusone)) {
            $this->info('No potential N+1 query problems detected.');
            return;
        }
        
        $this->warn('Potential N+1 query problems detected:');
        
        $table = new Table($this->output);
        $table->setHeaders(['Pattern', 'Count', 'Example Query', 'Suggestion']);
        
        foreach ($nplusone as $key => $pattern) {
            list($column, $operator) = explode(':', $key);
            
            $suggestion = $operator === 'IN'
                ? "Consider using eager loading with whereIn() instead of multiple queries."
                : "Consider using eager loading with with() instead of multiple queries.";
            
            $table->addRow([
                $key,
                $pattern['count'],
                $pattern['queries'][0],
                $suggestion,
            ]);
        }
        
        $table->render();
        
        $this->newLine();
        $this->info('Suggestions to fix N+1 problems:');
        $this->line('1. Use eager loading with the "with()" method on Eloquent queries.');
        $this->line('2. Use the "whereIn()" method instead of multiple individual queries.');
        $this->line('3. Consider implementing a repository pattern with automatic eager loading.');
        $this->line('4. For complex cases, consider implementing a custom query builder.');
    }
}
