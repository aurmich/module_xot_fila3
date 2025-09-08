<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Collection;

use Illuminate\Support\Collection;
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
     * @return Collection<int|string, string>
     */
    public function execute(
        Collection $collection,
        ?string $transKey,
    ): Collection {
<<<<<<< HEAD
            return $collection->map(fn (mixed $item): string => SafeStringCastAction::cast($item));
        }

=======
>>>>>>> 3d1ca073 (.)
        $this->transKey = $transKey;

        return $collection->map(fn (mixed $item): string => $this->trans($item));
    }

    /**
     * Traduce un singolo elemento.
     *
     * @return string L'elemento tradotto o l'elemento originale se la traduzione non esiste
     */
    public function trans(mixed $item): string
    {
        // Converte l'item in stringa se non lo è già
        $stringItem = is_string($item) ? $item : (string) $item;

        // Prima prova la traduzione diretta
        $key = $this->transKey.'.'.$stringItem;
        $trans = trans($key);

        // Se la traduzione esiste ed è una stringa, la restituisce
        if ($trans !== $key && \is_string($trans)) {
            return $trans;
        }

        // Seconda prova: sostituisce i punti con underscore
        $itemWithUnderscore = str_replace('.', '_', $stringItem);
        $keyWithUnderscore = $this->transKey.'.'.$itemWithUnderscore;
        $transWithUnderscore = trans($keyWithUnderscore);

        // Se la traduzione con underscore esiste ed è una stringa, la restituisce
        if ($transWithUnderscore !== $keyWithUnderscore && \is_string($transWithUnderscore)) {
            return $transWithUnderscore;
        }

        // Se nessuna traduzione è stata trovata, restituisce l'elemento originale
        return $stringItem;
    }
}
