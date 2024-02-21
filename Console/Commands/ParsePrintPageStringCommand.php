<?php

declare(strict_types=1);

/**
 * @see ---
 */

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Modules\Xot\Actions\ParsePrintPageStringAction;

class ParsePrintPageStringCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xot:parse-print-page {str}';

    /**
     * The console command description.
<<<<<<< HEAD
     *
     * @var string
     */
=======
     * @var string
*/
>>>>>>> 5c3a5a9 (up)
    protected $description = ' esplode';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $str = $this->argument('str');
        dddx(app(ParsePrintPageStringAction::class)->execute($str));
    }
}