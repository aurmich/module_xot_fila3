<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

<<<<<<< HEAD

=======
>>>>>>> 841fcfb (.)
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class GetSicureArrayByModelAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @return array<string, mixed>
     */
    public function execute(Model $model): array
    {

            return $data;
        }
=======
     * Ottiene un array sicuro dai dati del modello.
     *
     * @param  Model  $model  Il modello da convertire
     * @return array<string, mixed> L'array sicuro dei dati del modello
     */
    public function execute(Model $model): array
    {
        $data = $model->toArray();

        // Assicurati che le chiavi siano stringhe
        /** @var array<string, mixed> $secureData */
        $secureData = [];
        foreach ($data as $key => $value) {
            $stringKey = (string) $key;
            $secureData[$stringKey] = $value;
        }

        // Rimuovi campi sensibili se presenti
        unset($secureData['password'], $secureData['remember_token'], $secureData['api_token']);

        return $secureData;
>>>>>>> 841fcfb (.)
    }
}
