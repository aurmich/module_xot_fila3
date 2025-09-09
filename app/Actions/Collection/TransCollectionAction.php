<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Collection;

<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
// use Modules\Xot\Services\ArrayService;

use Illuminate\Support\Collection;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
>>>>>>> ad700fc8 (.)
use Spatie\QueueableAction\QueueableAction;

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
     * @param \Illuminate\Support\Collection<int|string, mixed> $collection
     * @param string|null $transKey
     * @return \Illuminate\Support\Collection<int|string, string>
=======
     * @param  Collection<int|string, mixed>  $collection
     * @return Collection<int|string, string>
>>>>>>> ad700fc8 (.)
     */
    public function execute(
        Collection $collection,
        ?string $transKey,
    ): Collection {
<<<<<<< HEAD
=======
        if ($transKey === null) {
            return $collection->map(fn (mixed $item): string => SafeStringCastAction::cast($item));
        }

>>>>>>> ad700fc8 (.)
        $this->transKey = $transKey;

        return $collection->map(fn (mixed $item): string => $this->trans($item));
    }

    /**
     * Traduce un singolo elemento.
     *
<<<<<<< HEAD
     * @param mixed $item
=======
     * @param  mixed  $item  L'elemento da tradurre
>>>>>>> ad700fc8 (.)
     * @return string L'elemento tradotto o l'elemento originale se la traduzione non esiste
     */
    public function trans(mixed $item): string
    {
        // Converte l'item in stringa se non lo è già
<<<<<<< HEAD
        if (!is_string($item)) {
            return (string) $item;
        }

        // Se non c'è transKey, restituisce l'elemento originale
        if (empty($this->transKey)) {
=======
        if (! \is_string($item)) {
            $item = SafeStringCastAction::cast($item);
        }

        if (empty($item) || $this->transKey === null) {
>>>>>>> ad700fc8 (.)
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
