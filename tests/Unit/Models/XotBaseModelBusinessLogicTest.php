<?php

declare(strict_types=1);

use Modules\Xot\Models\XotBaseModel;

describe('XotBaseModel Business Logic', function () {
    test('xot base model extends eloquent model', function () {
        expect(XotBaseModel::class)->toBeSubclassOf(\Illuminate\Database\Eloquent\Model::class);
    });

    test('xot base model can be instantiated', function () {
<<<<<<< HEAD
        $model = new XotBaseModel;

=======
        $model = new XotBaseModel();
        
>>>>>>> e697a77b (.)
        expect($model)->toBeInstanceOf(XotBaseModel::class);
        expect($model)->toBeInstanceOf(\Illuminate\Database\Eloquent\Model::class);
    });

    test('xot base model provides foundation for other models', function () {
        expect(class_exists(XotBaseModel::class))->toBeTrue();
    });
<<<<<<< HEAD
});
=======
});
>>>>>>> e697a77b (.)
