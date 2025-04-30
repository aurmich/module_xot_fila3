<?php

namespace Modules\Xot\app\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

class AnalyzeComponentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xot:analyze-components 
                            {--module= : Nome del modulo da analizzare}
                            {--type=all : Tipo di analisi (volt, folio, all)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Analizza i componenti Volt e le pagine Folio per identificare colli di bottiglia';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $module = $this->option('module');
        $type = $this->option('type');

        $this->info('Analisi Componenti SaluteOra');
        $this->newLine();

        if ($module) {
            $this->info("Analisi del modulo: {$module}");
        } else {
            $this->info("Analisi di tutti i moduli");
        }

        $this->newLine();

        if ($type === 'all' || $type === 'volt') {
            $this->analyzeVoltComponents($module);
        }

        if ($type === 'all' || $type === 'folio') {
            $this->analyzeFolioPages($module);
        }

        return Command::SUCCESS;
    }

    /**
     * Analizza i componenti Volt.
     *
     * @param string|null $module
     * @return void
     */
    protected function analyzeVoltComponents(?string $module): void
    {
        $this->info('Analisi Componenti Volt:');
        $this->newLine();

        $basePath = base_path('laravel/Modules');
        
        if ($module) {
            $modulePath = $basePath . '/' . $module;
            $this->analyzeModuleVoltComponents($module, $modulePath);
        } else {
            $modules = File::directories($basePath);
            
            foreach ($modules as $modulePath) {
                $moduleName = basename($modulePath);
                $this->analyzeModuleVoltComponents($moduleName, $modulePath);
            }
        }
    }

    /**
     * Analizza i componenti Volt di un modulo specifico.
     *
     * @param string $moduleName
     * @param string $modulePath
     * @return void
     */
    protected function analyzeModuleVoltComponents(string $moduleName, string $modulePath): void
    {
        $this->info("Modulo: {$moduleName}");
        
        // Cerca tutti i file Volt
        $finder = new Finder();
        $voltPath = $modulePath . '/resources/views/livewire';
        
        if (!File::exists($voltPath)) {
            $this->line(" - Nessun componente Volt trovato");
            $this->newLine();
            return;
        }
        
        $finder->files()->in($voltPath)->name('*.php');
        
        if (!$finder->hasResults()) {
            $this->line(" - Nessun componente Volt trovato");
            $this->newLine();
            return;
        }
        
        $components = [];
        $reRenderIssues = [];
        $computedProperties = 0;
        $deferredComponents = 0;
        $lazyComponents = 0;
        $heavyComponents = [];
        
        foreach ($finder as $file) {
            $content = $file->getContents();
            $componentName = $file->getRelativePathname();
            
            // Conta le proprietà e i metodi
            $propertyCount = preg_match_all('/public\s+(\$[a-zA-Z0-9_]+)/', $content, $matches);
            $methodCount = preg_match_all('/public\s+function\s+([a-zA-Z0-9_]+)/', $content, $matches);
            
            $components[] = [
                'name' => $componentName,
                'properties' => $propertyCount,
                'methods' => $methodCount,
                'size' => strlen($content)
            ];
            
            // Verifica problemi di re-rendering
            $hasComputed = preg_match('/#\[Computed\]/', $content);
            $hasDeferLoad = preg_match('/wire:init|wire:poll|wire:loading/', $content);
            $hasLazy = preg_match('/\$this->lazy\(|\$this->lazyLoad\(/', $content);
            
            if ($hasComputed) {
                $computedProperties++;
            }
            
            if ($hasDeferLoad) {
                $deferredComponents++;
            }
            
            if ($hasLazy) {
                $lazyComponents++;
            }
            
            // Verifica componenti pesanti
            if (strlen($content) > 10 * 1024) { // Più di 10KB
                $heavyComponents[] = $componentName;
            }
            
            // Verifica problemi di re-rendering
            if ($propertyCount > 5 && !$hasComputed && !$hasDeferLoad && !$hasLazy) {
                $reRenderIssues[] = $componentName;
            }
        }
        
        // Mostra statistiche
        $this->line(" - Componenti totali: " . count($components));
        $this->line(" - Componenti con proprietà computed: {$computedProperties}");
        $this->line(" - Componenti con caricamento differito: {$deferredComponents}");
        $this->line(" - Componenti con lazy loading: {$lazyComponents}");
        
        // Mostra componenti pesanti
        if (count($heavyComponents) > 0) {
            $this->warn(" - Componenti pesanti trovati:");
            
            foreach ($heavyComponents as $component) {
                $this->line("   - {$component}");
            }
        }
        
        // Mostra problemi di re-rendering
        if (count($reRenderIssues) > 0) {
            $this->warn(" - Componenti con potenziali problemi di re-rendering:");
            
            foreach ($reRenderIssues as $component) {
                $this->line("   - {$component}");
            }
        }
        
        // Suggerimenti per l'ottimizzazione
        if (count($reRenderIssues) > 0) {
            $this->info(" - Suggerimento: Utilizzare #[Computed] per le proprietà calcolate e ridurre i re-render");
        }
        
        if (count($heavyComponents) > 0) {
            $this->info(" - Suggerimento: Suddividere i componenti pesanti in componenti più piccoli o utilizzare lazy loading");
        }
        
        $this->newLine();
    }

    /**
     * Analizza le pagine Folio.
     *
     * @param string|null $module
     * @return void
     */
    protected function analyzeFolioPages(?string $module): void
    {
        $this->info('Analisi Pagine Folio:');
        $this->newLine();
        
        // Analizza le pagine Folio in resources/views/pages
        $pagesPath = base_path('laravel/resources/views/pages');
        
        if (!File::exists($pagesPath)) {
            $this->line(" - Directory pages non trovata");
            $this->newLine();
            return;
        }
        
        $locales = File::directories($pagesPath);
        
        foreach ($locales as $localePath) {
            $locale = basename($localePath);
            $this->analyzeLocalePages($locale, $localePath);
        }
    }

    /**
     * Analizza le pagine Folio per una specifica locale.
     *
     * @param string $locale
     * @param string $localePath
     * @return void
     */
    protected function analyzeLocalePages(string $locale, string $localePath): void
    {
        $this->info("Locale: {$locale}");
        
        // Cerca tutte le pagine Blade
        $finder = new Finder();
        $finder->files()->in($localePath)->name('*.blade.php');
        
        if (!$finder->hasResults()) {
            $this->line(" - Nessuna pagina Folio trovata");
            $this->newLine();
            return;
        }
        
        $pages = [];
        $inlineVoltComponents = 0;
        $externalVoltComponents = 0;
        $heavyPages = [];
        $missingMetaPages = [];
        $missingLocalePages = [];
        
        foreach ($finder as $file) {
            $content = $file->getContents();
            $pageName = $file->getRelativePathname();
            
            // Conta i componenti Volt
            $inlineVoltCount = preg_match_all('/<x-volt::script>/', $content, $matches);
            $externalVoltCount = preg_match_all('/<livewire:/', $content, $matches);
            
            $pages[] = [
                'name' => $pageName,
                'inlineVolt' => $inlineVoltCount,
                'externalVolt' => $externalVoltCount,
                'size' => strlen($content)
            ];
            
            // Verifica pagine pesanti
            if (strlen($content) > 20 * 1024) { // Più di 20KB
                $heavyPages[] = $pageName;
            }
            
            // Verifica meta tag
            if (!preg_match('/<title>|<meta name="description"|<meta property="og:/', $content)) {
                $missingMetaPages[] = $pageName;
            }
            
            // Verifica gestione locale
            if (!preg_match('/app\(\)->getLocale\(\)|locale\(\)|__\(/', $content)) {
                $missingLocalePages[] = $pageName;
            }
            
            // Aggiorna contatori
            $inlineVoltComponents += $inlineVoltCount;
            $externalVoltComponents += $externalVoltCount;
        }
        
        // Mostra statistiche
        $this->line(" - Pagine totali: " . count($pages));
        $this->line(" - Componenti Volt inline: {$inlineVoltComponents}");
        $this->line(" - Componenti Volt esterni: {$externalVoltComponents}");
        
        // Mostra pagine pesanti
        if (count($heavyPages) > 0) {
            $this->warn(" - Pagine pesanti trovate:");
            
            foreach ($heavyPages as $page) {
                $this->line("   - {$page}");
            }
        }
        
        // Mostra pagine senza meta tag
        if (count($missingMetaPages) > 0) {
            $this->warn(" - Pagine senza meta tag SEO:");
            
            foreach ($missingMetaPages as $page) {
                $this->line("   - {$page}");
            }
        }
        
        // Mostra pagine senza gestione locale
        if (count($missingLocalePages) > 0) {
            $this->warn(" - Pagine senza gestione esplicita della locale:");
            
            foreach ($missingLocalePages as $page) {
                $this->line("   - {$page}");
            }
        }
        
        // Suggerimenti per l'ottimizzazione
        if (count($heavyPages) > 0) {
            $this->info(" - Suggerimento: Suddividere le pagine pesanti in componenti più piccoli o utilizzare lazy loading");
        }
        
        if (count($missingMetaPages) > 0) {
            $this->info(" - Suggerimento: Aggiungere meta tag SEO a tutte le pagine");
        }
        
        if (count($missingLocalePages) > 0) {
            $this->info(" - Suggerimento: Assicurarsi che tutte le pagine gestiscano correttamente la locale");
        }
        
        $this->newLine();
    }

    /**
     * Verifica se un componente Volt è ottimizzato.
     *
     * @param string $content
     * @return array
     */
    protected function analyzeVoltComponentOptimization(string $content): array
    {
        $issues = [];
        
        // Verifica proprietà non ottimizzate
        if (preg_match_all('/public\s+(\$[a-zA-Z0-9_]+)/', $content, $matches)) {
            $properties = $matches[1];
            
            foreach ($properties as $property) {
                // Verifica se la proprietà è utilizzata in un metodo render
                if (preg_match('/function\s+render.*?' . preg_quote($property, '/') . '/s', $content)) {
                    // Verifica se la proprietà non è computed
                    if (!preg_match('/#\[Computed\].*?function\s+' . str_replace('$', '', $property) . '/s', $content)) {
                        $issues[] = "Proprietà {$property} utilizzata nel render ma non è computed";
                    }
                }
            }
        }
        
        // Verifica metodi non ottimizzati
        if (preg_match_all('/public\s+function\s+([a-zA-Z0-9_]+)/', $content, $matches)) {
            $methods = $matches[1];
            
            foreach ($methods as $method) {
                // Escludi metodi speciali
                if (in_array($method, ['render', 'mount', 'boot', 'dehydrate', 'hydrate'])) {
                    continue;
                }
                
                // Verifica se il metodo è chiamato nel render ma non è memoized
                if (preg_match('/function\s+render.*?\$this->' . $method . '/s', $content) && 
                    !preg_match('/\$this->memoize\(\'' . $method . '\'/', $content)) {
                    $issues[] = "Metodo {$method} chiamato nel render ma non è memoized";
                }
            }
        }
        
        return $issues;
    }
}
