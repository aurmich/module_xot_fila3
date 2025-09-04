<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Collection;

<<<<<<< HEAD
// use Modules\Xot\Services\ArrayService;
=======
use Illuminate\Support\Collection;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> 841fcfb (.)



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

=======
     * @param Collection<int|string, mixed> $collection
     * @param string|null $transKey
>>>>>>> 841fcfb (.)
     * @return Collection<int|string, string>
     */
    public function execute(
        Collection $collection,
        ?string $transKey,
    ): Collection {
<<<<<<< HEAD

=======
        if ($transKey === null) {
>>>>>>> 841fcfb (.)
            return $collection->map(fn (mixed $item): string => SafeStringCastAction::cast($item));
        }

        $this->transKey = $transKey;

        return $collection->map(fn (mixed $item): string => $this->trans($item));
    }

    /**
     * Traduce un singolo elemento.
     *
<<<<<<< HEAD

=======
     * @param mixed $item L'elemento da tradurre
>>>>>>> 841fcfb (.)
     * @return string L'elemento tradotto o l'elemento originale se la traduzione non esiste
     */
    public function trans(mixed $item): string
    {
        // Converte l'item in stringa se non lo è già
<<<<<<< HEAD

            return $item;
        }
=======
        $item = SafeStringCastAction::cast($item);
>>>>>>> 841fcfb (.)

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
