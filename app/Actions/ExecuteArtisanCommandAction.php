<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Process;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Classe per eseguire comandi Artisan in modo sicuro.
 */
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Process;
use Spatie\QueueableAction\QueueableAction;

class ExecuteArtisanCommandAction
{
    use QueueableAction;

    /**
     * Lista dei comandi consentiti per motivi di sicurezza.
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> e5c56c3 (.)
=======
     *
>>>>>>> 7b67053 (fix: auto resolve conflict)
     * @var array<int, string>
     */
    private array $allowedCommands = [
        'migrate',
        'filament:upgrade',
        'filament:optimize',
        'view:cache',
        'config:cache',
        'route:cache',
        'event:cache',
        'queue:restart',
    ];

    /**
     * Esegue un comando Artisan e restituisce i risultati.
     *
     * @param string $command Il comando Artisan da eseguire (senza "php artisan")
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @throws \RuntimeException Se il comando non è consentito o si verifica un errore
     *
=======
     * 
     * @throws \RuntimeException Se il comando non è consentito o si verifica un errore
     * 
>>>>>>> e5c56c3 (.)
=======
     *
     * @throws \RuntimeException Se il comando non è consentito o si verifica un errore
     *
>>>>>>> 7b67053 (fix: auto resolve conflict)
     * @return array{
     *     command: string,
     *     output: array<int, string>,
     *     status: 'completed'|'failed',
     *     exitCode: int
     * } Array con informazioni sull'esecuzione del comando
     */
    public function execute(string $command): array
    {
        Assert::stringNotEmpty($command, 'Il comando non può essere vuoto');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
        
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
<<<<<<< HEAD
=======
=======
    public function execute(string $command, string $processId): array
    {
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======

>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
        
    public function execute(string $command, string $processId): array
    {

>>>>>>> c2dac53 (.)
        if (! $this->isCommandAllowed($command)) {
            throw new \RuntimeException("Comando non consentito: {$command}");
        }

        /** @var array<int, string> $output */
        $output = [];
        $status = 'running';

        Event::dispatch('artisan-command.started', [$command]);
        $output = [];
        $status = 'running';

        // Store process info in cache
        Cache::put("artisan.command.{$processId}", [
            'command' => $command,
            'status' => $status,
            'output' => [],
        ], now()->addHours(1));

        try {
            $process = Process::path(base_path())
                ->command("php artisan {$command}")
                ->timeout(300)
                ->start();

            // Cattura l'output in tempo reale
            while ($process->running()) {
                $data = $process->latestOutput();
                if (! empty($data)) {
                    $formattedData = trim($data);
                    if (! empty($formattedData)) {
                        $output[] = $formattedData;
                        Event::dispatch('artisan-command.output', [$command, $formattedData]);
                        Event::dispatch('artisan-command.output', [$command, $formattedData]);
                        $this->broadcastOutput($processId, $formattedData);
                        $this->updateCache($processId, $formattedData);
                    }
                }

                $errorData = $process->latestErrorOutput();
                if (! empty($errorData)) {
                    $formattedError = trim($errorData);
                    if (! empty($formattedError)) {
                        $output[] = '[ERROR] '.$formattedError;
                        Event::dispatch('artisan-command.output', [$command, '[ERROR] '.$formattedError]);
                    }
                }

                usleep(50000); // 50ms di pausa per evitare sovraccarico della CPU
                        $this->broadcastOutput($processId, '[ERROR] '.$formattedError, 'error');
                        $this->updateCache($processId, '[ERROR] '.$formattedError);
                    }
                }

                usleep(100000); // 100ms pause to prevent CPU overload
            }

            $result = $process->wait();

            // Cattura qualsiasi output residuo
            $finalOutput = trim($result->output());
            if (! empty($finalOutput)) {
                $output[] = $finalOutput;
                Event::dispatch('artisan-command.output', [$command, $finalOutput]);
            // Capture any remaining output
            $finalOutput = trim($result->output());
            if (! empty($finalOutput)) {
                $output[] = $finalOutput;
                $this->broadcastOutput($processId, $finalOutput);
                $this->updateCache($processId, $finalOutput);
            }

            $finalErrorOutput = trim($result->errorOutput());
            if (! empty($finalErrorOutput)) {
                $output[] = '[ERROR] '.$finalErrorOutput;
                Event::dispatch('artisan-command.output', [$command, '[ERROR] '.$finalErrorOutput]);
                Event::dispatch('artisan-command.output', [$command, '[ERROR] '.$finalErrorOutput]);
                $this->broadcastOutput($processId, '[ERROR] '.$finalErrorOutput, 'error');
                $this->updateCache($processId, '[ERROR] '.$finalErrorOutput);
            }

            if ($result->successful()) {
                $status = 'completed';
                Event::dispatch('artisan-command.completed', [$command]);
            } else {
                $status = 'failed';
                Event::dispatch('artisan-command.failed', [$command, $finalErrorOutput]);
            }

                $this->broadcastOutput($processId, 'Comando completato con successo', 'completed');
            } else {
                $status = 'failed';
                $this->broadcastOutput($processId, $finalErrorOutput, 'error');
            }

            // Update final status in cache
            Cache::put("artisan.command.{$processId}", [
                'command' => $command,
                'status' => $status,
                'output' => $output,
            ], now()->addHours(1));

            return [
                'command' => $command,
                'output' => $output,
                'status' => $status,
                'exitCode' => $result->exitCode() ?? 0,
            ];
        } catch (\Throwable $e) {
            Event::dispatch('artisan-command.error', [$command, $e->getMessage()]);
            throw new \RuntimeException(
<<<<<<< HEAD
<<<<<<< HEAD
                "Errore durante l'esecuzione del comando {$command}: {$e->getMessage()}",
                (int) $e->getCode(),
=======
                "Errore durante l'esecuzione del comando {$command}: {$e->getMessage()}", 
                (int) $e->getCode(), 
>>>>>>> e5c56c3 (.)
=======
                "Errore durante l'esecuzione del comando {$command}: {$e->getMessage()}",
                (int) $e->getCode(),
>>>>>>> 7b67053 (fix: auto resolve conflict)
                $e
            );
        }
    }

    /**
     * Verifica se un comando è presente nella lista dei comandi consentiti.
     *
     * @param string $command Il comando da verificare
     * @return bool True se il comando è consentito, false altrimenti
     */
    private function isCommandAllowed(string $command): bool
    {
        Assert::stringNotEmpty($command, 'Il comando non può essere vuoto');
        return in_array($command, $this->allowedCommands, true);
    }
                'exitCode' => $result->exitCode(),
            ];
        } catch (\Throwable $e) {
            $this->broadcastOutput($processId, $e->getMessage(), 'error');
            throw new \RuntimeException("Errore durante l'esecuzione del comando {$command}: {$e->getMessage()}", (int) $e->getCode(), $e);
        }
    }

    private function isCommandAllowed(string $command): bool
    {
        return in_array($command, $this->allowedCommands, true);
    }

    private function broadcastOutput(string $processId, string $output, string $type = 'output'): void
    {
        event(new CommandOutputEvent($processId, $output, $type));
    }

    private function updateCache(string $processId, string $output): void
    {
        $data = Cache::get("artisan.command.{$processId}", ['output' => []]);
        $data['output'][] = $output;
        Cache::put("artisan.command.{$processId}", $data, now()->addHours(1));
    }
}
