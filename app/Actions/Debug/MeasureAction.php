<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Debug;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Webmozart\Assert\Assert;

/**
 * Classe per misurare le performance di esecuzione di un blocco di codice.
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> e5c56c3 (.)
=======
 *
>>>>>>> 7b67053 (fix: auto resolve conflict)
 * @template T
 */
class MeasureAction
{
    /**
     * Esegue una closure misurando il tempo di esecuzione e l'utilizzo di memoria.
     *
     * @param \Closure():T $closure La closure da eseguire e misurare
     * @param string $label Etichetta opzionale per identificare la misurazione
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> e5c56c3 (.)
=======
     *
>>>>>>> 7b67053 (fix: auto resolve conflict)
     * @return T Il risultato dell'esecuzione della closure
     */
    public function execute(\Closure $closure, string $label = ''): mixed
    {
        Assert::isCallable($closure, 'Il parametro $closure deve essere una funzione chiamabile');
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e5c56c3 (.)
=======

>>>>>>> 7b67053 (fix: auto resolve conflict)
        $start = microtime(true);
        $memory_start = memory_get_usage();

        // Eseguiamo la closure e otteniamo il risultato

class MeasureAction
{
    public function execute(\Closure $closure, string $label = ''): mixed
    {
        $start = microtime(true);
        $memory_start = memory_get_usage();

        $result = $closure();

        $end = microtime(true);
        $memory_end = memory_get_usage();

        // Calcoliamo le metriche di performance
        $execution_time = ($end - $start) * 1000; // Conversione in millisecondi
        $memory_usage = ($memory_end - $memory_start) / 1024; // Conversione in KB
        // Calcoliamo le metriche di performance
        $execution_time = ($end - $start) * 1000; // Conversione in millisecondi
        $memory_usage = ($memory_end - $memory_start) / 1024; // Conversione in KB
        $execution_time = ($end - $start) * 1000; // Convert to milliseconds
        $memory_usage = ($memory_end - $memory_start) / 1024; // Convert to KB

        $metrics = [
            'label' => $label,
            'execution_time' => round($execution_time, 2).' ms',
            'memory_usage' => round($memory_usage, 2).' KB',
            // 'peak_memory' => round(memory_get_peak_usage() / 1024 / 1024, 2).' MB',
        ];

        // Mostriamo una notifica con le metriche
        Notification::make()
            ->title('Performance Metrics '.($label !== '' ? $label : 'Unnamed'))
        // Mostriamo una notifica con le metriche
        Notification::make()
            ->title('Performance Metrics '.($label !== '' ? $label : 'Unnamed'))
        Notification::make()
            ->title('Performance Metrics '.$label)
            ->body($metrics['execution_time'].'  '.$metrics['memory_usage'])
            ->success()
            ->persistent()
            ->send();

        // Log::debug('Performance Metrics', $metrics);

        /** @var T $result */
        /** @var T $result */
        return $result;
    }
}
