<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Store;

use Fidum\EloquentMorphToOne\MorphToOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Modules\Xot\Datas\RelationData as RelationDTO;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
/**
 * Azione per gestire le relazioni morphToOne nei modelli.
 */
=======
>>>>>>> e5c56c3 (.)
class MorphToOneAction
{
    use QueueableAction;

<<<<<<< HEAD
    /**
     * Esegue l'azione di creazione per una relazione morphToOne.
     *
     * @param Model $model Il modello su cui operare
     * @param RelationDTO $relationDTO I dati della relazione da creare
     */
    public function execute(Model $model, RelationDTO $relationDTO): void
    {
=======
    public function execute(Model $model, RelationDTO $relationDTO): void
    {
<<<<<<< HEAD
        //if ($relationDTO === null) {
        //    return;
        //}
=======
<<<<<<< HEAD
        //if ($relationDTO === null) {
        //    return;
        //}
=======
        if ($relationDTO === null) {
            return;
        }
>>>>>>> origin/dev
>>>>>>> origin/dev

>>>>>>> e5c56c3 (.)
        Assert::isInstanceOf($rows = $relationDTO->rows, MorphToOne::class);

        if (! isset($relationDTO->data['lang'])) {
            $relationDTO->data['lang'] = App::getLocale();
        }

<<<<<<< HEAD
        $rows->create($relationDTO->data);
=======
<<<<<<< HEAD
        //if ($rows !== null) {
        $rows->create($relationDTO->data);
        //}
=======
<<<<<<< HEAD
        //if ($rows !== null) {
        $rows->create($relationDTO->data);
        //}
=======
        if ($rows !== null) {
            $rows->create($relationDTO->data);
        }
>>>>>>> origin/dev
>>>>>>> origin/dev
        // } else {
        //    $rows->sync($relation->data);
        // }

        /*
        dddx([
            'message' => 'wip',
            'row' => $row,
            'relation' => $relation,
            'relation_rows' => $relation->rows->exists(),
            't' => $row->{$relation->name},
        ]);

        dddx('wip');
        */
>>>>>>> e5c56c3 (.)
    }
}
