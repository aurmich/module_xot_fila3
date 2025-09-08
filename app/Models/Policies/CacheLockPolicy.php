<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 3d1ca073 (.)
use Modules\Xot\Models\CacheLock;

class CacheLockPolicy extends XotBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('cache_lock.viewAny'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(ProfileContract $user, CacheLock $cache_lock): bool
    {
        return $user->hasPermissionTo('cache_lock.view'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('cache_lock.create'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(ProfileContract $user, CacheLock $cache_lock): bool
    {
        return $user->hasPermissionTo('cache_lock.update'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(ProfileContract $user, CacheLock $cache_lock): bool
    {
        return $user->hasPermissionTo('cache_lock.delete'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(ProfileContract $user, CacheLock $cache_lock): bool
    {
        return $user->hasPermissionTo('cache_lock.restore'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(ProfileContract $user, CacheLock $cache_lock): bool
    {
        return $user->hasPermissionTo('cache_lock.forceDelete'); /** @phpstan-ignore method.nonObject */
    }
}
