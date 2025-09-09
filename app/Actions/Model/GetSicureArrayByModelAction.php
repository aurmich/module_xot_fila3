<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class GetSicureArrayByModelAction
{
    use QueueableAction;

    /**
     * Converte un modello in un array sicuro.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return array<string, mixed>
     */
    public function execute(Model $model): array
    {
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
    }
}
