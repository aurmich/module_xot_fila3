<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 3d1ca073 (.)
use Modules\Xot\Models\Module;

class ModulePolicy extends XotBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('module.viewAny'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(ProfileContract $user, Module $module): bool
    {
        return $user->hasPermissionTo('module.view'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('module.create'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(ProfileContract $user, Module $module): bool
    {
        return $user->hasPermissionTo('module.update'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(ProfileContract $user, Module $module): bool
    {
        return $user->hasPermissionTo('module.delete'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(ProfileContract $user, Module $module): bool
    {
        return $user->hasPermissionTo('module.restore'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(ProfileContract $user, Module $module): bool
    {
        return $user->hasPermissionTo('module.forceDelete'); /** @phpstan-ignore method.nonObject */
    }
}
