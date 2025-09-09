<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Collection;

// use Modules\Xot\Services\ArrayService;

<<<<<<< HEAD
<<<<<<< HEAD
use Webmozart\Assert\Assert;
use Illuminate\Support\Collection;
use Spatie\QueueableAction\QueueableAction;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
=======

>>>>>>> c4ec0fb6 (.)
=======
use Illuminate\Support\Collection;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> edc8a701 (.)

/**
 * Action per la traduzione di elementi di una collezione.
 */
class TransCollectionAction
{
    use QueueableAction;

    public ?string $transKey;

    /**
     * Esegue la traduzione di una collezione.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param Collection<int|string, mixed> $collection
     * @param string|null $transKey
     *
=======
>>>>>>> c4ec0fb6 (.)
=======
     * @param  Collection<int|string, mixed>  $collection
>>>>>>> edc8a701 (.)
     * @return Collection<int|string, string>
     */
    public function execute(
        Collection $collection,
        ?string $transKey,
    ): Collection {
<<<<<<< HEAD
<<<<<<< HEAD
        if (null === $transKey) {
=======
>>>>>>> c4ec0fb6 (.)
=======
        if ($transKey === null) {
>>>>>>> edc8a701 (.)
            return $collection->map(fn (mixed $item): string => SafeStringCastAction::cast($item));
        }

        $this->transKey = $transKey;

        return $collection->map(fn (mixed $item): string => $this->trans($item));
    }

    /**
     * Traduce un singolo elemento.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param mixed $item L'elemento da tradurre
     *
=======
>>>>>>> c4ec0fb6 (.)
=======
     * @param  mixed  $item  L'elemento da tradurre
>>>>>>> edc8a701 (.)
     * @return string L'elemento tradotto o l'elemento originale se la traduzione non esiste
     */
    public function trans(mixed $item): string
    {
        // Converte l'item in stringa se non lo è già
<<<<<<< HEAD
<<<<<<< HEAD
        if (!\is_string($item)) {
            $item = SafeStringCastAction::cast($item);
        }

        if (empty($item) || null === $this->transKey) {
=======

>>>>>>> c4ec0fb6 (.)
=======
        if (! \is_string($item)) {
            $item = SafeStringCastAction::cast($item);
        }

        if (empty($item) || $this->transKey === null) {
>>>>>>> edc8a701 (.)
            return $item;
        }

        // Prima prova la traduzione diretta
        $key = $this->transKey.'.'.$item;
        $trans = trans($key);

        // Se la traduzione esiste ed è una stringa, la restituisce
        if ($trans !== $key && \is_string($trans)) {
            return $trans;
        }

        // Seconda prova: sostituisce i punti con underscore
        $itemWithUnderscore = str_replace('.', '_', $item);
        $keyWithUnderscore = $this->transKey.'.'.$itemWithUnderscore;
        $transWithUnderscore = trans($keyWithUnderscore);

        // Se la traduzione con underscore esiste ed è una stringa, la restituisce
        if ($transWithUnderscore !== $keyWithUnderscore && \is_string($transWithUnderscore)) {
            return $transWithUnderscore;
        }

        // Se nessuna traduzione è stata trovata, restituisce l'elemento originale
        return $item;
    }
}
