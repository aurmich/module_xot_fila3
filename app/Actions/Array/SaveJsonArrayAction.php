<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
use Safe\Exceptions\JsonException;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Class SaveJsonArrayAction
 * 
 * Salva un array in formato JSON in un file specificato.
 */
=======
>>>>>>> 3268b83 (.)
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
=======
use Safe\Exceptions\JsonException;
>>>>>>> 355a587 (.)
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
/**
 * Class SaveJsonArrayAction
 * 
 * Salva un array in formato JSON in un file specificato.
 */
>>>>>>> 355a587 (.)
class SaveJsonArrayAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(array $data, string $filename): bool
    {
        $content = \Safe\json_encode($data, JSON_PRETTY_PRINT);
        //if ($content === false) {
        //    return false;
        //}
        return (bool) \Safe\file_put_contents($filename, $content);
=======
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Salva un array in formato JSON.
     *
     * @param array<string, mixed> $data Array da salvare
     * @param string $filename Percorso del file di destinazione
     * @throws JsonException Se si verifica un errore durante la codifica JSON
     * @throws \RuntimeException Se si verifica un errore durante la scrittura del file
     */
    public function execute(array $data, string $filename): bool
    {
        Assert::notEmpty($data, 'L\'array non può essere vuoto');
        Assert::stringNotEmpty($filename, 'Il nome del file non può essere vuoto');
        Assert::fileExists(dirname($filename), 'La directory di destinazione non esiste');

        try {
            $jsonContent = \Safe\json_encode($data, JSON_PRETTY_PRINT);
            \Safe\file_put_contents($filename, $jsonContent);
            
            return true;
        } catch (JsonException $e) {
            throw new \RuntimeException(
                sprintf('Errore durante il salvataggio del file JSON: %s', $e->getMessage()),
                $e->getCode(),
                $e
            );
        }
=======
     * Salva un array come file JSON.
=======
     * Salva un array in formato JSON.
>>>>>>> 355a587 (.)
     *
     * @param array<string, mixed> $data Array da salvare
     * @param string $filename Percorso del file di destinazione
     * @throws JsonException Se si verifica un errore durante la codifica JSON
     * @throws \RuntimeException Se si verifica un errore durante la scrittura del file
     */
    public function execute(array $data, string $filename): bool
    {
<<<<<<< HEAD
        $content = \Safe\json_encode($data, JSON_PRETTY_PRINT);
        
        // Non è necessario verificare se $content è false perché \Safe\json_encode
        // lancia un'eccezione in caso di errore invece di restituire false
        
        return (bool) \Safe\file_put_contents($filename, $content);
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
        Assert::notEmpty($data, 'L\'array non può essere vuoto');
        Assert::stringNotEmpty($filename, 'Il nome del file non può essere vuoto');
        Assert::fileExists(dirname($filename), 'La directory di destinazione non esiste');

        try {
            $jsonContent = \Safe\json_encode($data, JSON_PRETTY_PRINT);
            \Safe\file_put_contents($filename, $jsonContent);
            
            return true;
        } catch (JsonException $e) {
            throw new \RuntimeException(
                sprintf('Errore durante il salvataggio del file JSON: %s', $e->getMessage()),
                $e->getCode(),
                $e
            );
        }
>>>>>>> 355a587 (.)
    }
}
