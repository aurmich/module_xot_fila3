<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class GetSicureArrayByModelAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * Converte un modello in un array sicuro.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
=======
>>>>>>> ad700fc8 (.)
     * @return array<string, mixed>
     */
    public function execute(Model $model): array
    {
<<<<<<< HEAD
        $data = $model->toArray();
        
        // Rimuove eventuali dati sensibili
        $data = $this->sanitizeData($data);
        
        return $data;
    }

    /**
     * Sanitizza i dati rimuovendo informazioni sensibili.
     *
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    private function sanitizeData(array $data): array
    {
        // Rimuove campi sensibili comuni
        $sensitiveFields = ['password', 'remember_token', 'api_token', 'secret'];
        
        foreach ($sensitiveFields as $field) {
            if (array_key_exists($field, $data)) {
                unset($data[$field]);
            }
        }
        
        return $data;
=======
        try {
            return $model->attributesToArray(); // "" is not a valid backing value for enum Modules\SaluteOra\Enums\OccurrenceFrequencyEnum
        } catch (\ValueError $e) {
            $data = [];
            foreach ($model->getAttributes() as $key => $value) {
                try {
                    $data[$key] = $this->$key;
                    /** @phpstan-ignore-next-line */
                } catch (\ValueError $e) {

                }
            }

            return $data;
        }
>>>>>>> ad700fc8 (.)
    }
}
