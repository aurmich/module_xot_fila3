<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 3d1ca073 (.)
use Modules\Xot\Models\InformationSchemaTable;

class InformationSchemaTablePolicy extends XotBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('information_schema_table.viewAny'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(ProfileContract $user, InformationSchemaTable $information_schema_table): bool
    {
        return $user->hasPermissionTo('information_schema_table.view'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('information_schema_table.create'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(ProfileContract $user, InformationSchemaTable $information_schema_table): bool
    {
        return $user->hasPermissionTo('information_schema_table.update'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(ProfileContract $user, InformationSchemaTable $information_schema_table): bool
    {
        return $user->hasPermissionTo('information_schema_table.delete'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(ProfileContract $user, InformationSchemaTable $information_schema_table): bool
    {
        return $user->hasPermissionTo('information_schema_table.restore'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(ProfileContract $user, InformationSchemaTable $information_schema_table): bool
    {
        return $user->hasPermissionTo('information_schema_table.forceDelete'); /** @phpstan-ignore method.nonObject */
    }
}
