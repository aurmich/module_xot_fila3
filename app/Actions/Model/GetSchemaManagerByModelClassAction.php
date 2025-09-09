<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Doctrine\DBAL\Schema\AbstractSchemaManager;
<<<<<<< HEAD
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Facades\DB;
=======
use Illuminate\Database\Eloquent\Model as EloquentModel;
>>>>>>> c4ec0fb6 (.)
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetSchemaManagerByModelClassAction
{
    use QueueableAction;

    /**
     * Ottiene lo schema manager Doctrine per una classe di modello Eloquent.
     *
<<<<<<< HEAD
     * @param string $modelClass La classe del modello
=======
     * @param  string  $modelClass  La classe del modello
>>>>>>> c4ec0fb6 (.)
     * @return AbstractSchemaManager Lo schema manager di Doctrine
     */
    public function execute(string $modelClass): AbstractSchemaManager
    {
        Assert::isInstanceOf($model = app($modelClass), EloquentModel::class);
        $connection = $model->getConnection();
<<<<<<< HEAD
        
=======

>>>>>>> c4ec0fb6 (.)
        // In Laravel 9+ il metodo getDoctrineSchemaManager è stato deprecato
        // ma getDoctrineConnection() non esiste, dobbiamo usare getDoctrineSchemaManager direttamente
        if (method_exists($connection, 'getDoctrineSchemaManager')) {
            /** @phpstan-ignore deprecated.method */
<<<<<<< HEAD
            return $connection->getDoctrineSchemaManager();
=======
            $schemaManager = $connection->getDoctrineSchemaManager();
            Assert::isInstanceOf($schemaManager, AbstractSchemaManager::class, 'Schema manager must be instance of AbstractSchemaManager');

            return $schemaManager;
>>>>>>> c4ec0fb6 (.)
        }

        // Se in futuro il metodo getDoctrineConnection diventa disponibile, possiamo usare questo
        throw new \RuntimeException('Non è possibile ottenere lo schema manager Doctrine per questo modello.');
    }
}
