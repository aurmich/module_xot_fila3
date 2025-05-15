<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Facades\Schema;
use Webmozart\Assert\Assert;

class TableExistsByModelClassActions
{
    public function execute(string $modelClass): bool
    {
        if (! class_exists($modelClass)) {
            return false;
        }

        Assert::isInstanceOf($model = app($modelClass), EloquentModel::class);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< Updated upstream
<<<<<<< HEAD
=======
>>>>>>> Stashed changes
>>>>>>> bdc979b (.)

         // Controlla se il modello utilizza Sushi
         if (in_array('Sushi\Sushi', class_uses_recursive($modelClass)) || method_exists($model, 'sushiRows')) {
            return true; // I modelli Sushi sono considerati come se avessero sempre una tabella
        }
        
<<<<<<< HEAD
=======
<<<<<<< Updated upstream
=======
>>>>>>> 4241492 (.)
=======
>>>>>>> Stashed changes
=======
>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)
        $tableName = $model->getTable();

        return Schema::connection($model->getConnectionName())->hasTable($tableName);
    }
}
