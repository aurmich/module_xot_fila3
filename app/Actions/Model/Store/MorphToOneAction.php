<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Store;

use Fidum\EloquentMorphToOne\MorphToOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Modules\Xot\Datas\RelationData as RelationDTO;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Azione per gestire le relazioni morphToOne nei modelli.
 */
/**
 * Azione per gestire le relazioni morphToOne nei modelli.
 */
class MorphToOneAction
{
    use QueueableAction;

    public function execute(Model $model, RelationDTO $relationDTO): void
    {
        //if ($relationDTO === null) {
        //    return;
        //}
        //if ($relationDTO === null) {
        //    return;
        //}
        if ($relationDTO === null) {
            return;
        }

        Assert::isInstanceOf($rows = $relationDTO->rows, MorphToOne::class);

    /**
     * Esegue l'azione di creazione per una relazione morphToOne.
     *
     * @param Model $model Il modello su cui operare
     * @param RelationDTO $relationDTO I dati della relazione da creare
     */
    public function execute(Model $model, RelationDTO $relationDTO): void
    {
        Assert::isInstanceOf($rows = $relationDTO->rows, MorphToOne::class);

    public function execute(Model $model, RelationDTO $relationDTO): void
    {
        Assert::isInstanceOf($rows = $relationDTO->rows, MorphToOne::class);
        // dddx(['row' => $row, 'relation' => $relation, 'relation_data' => $relation->data]);

        // if (is_array($relation->data)) {
        if (! isset($relationDTO->data['lang'])) {
            $relationDTO->data['lang'] = App::getLocale();
        }

        //if ($rows !== null) {
        $rows->create($relationDTO->data);
        //}
        //if ($rows !== null) {
        $rows->create($relationDTO->data);
        //}
        if ($rows !== null) {
            $rows->create($relationDTO->data);
        }
        $rows->create($relationDTO->data);
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
    }
}
