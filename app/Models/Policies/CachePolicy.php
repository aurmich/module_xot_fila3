<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Cache;
=======
use Modules\Xot\Models\Cache;
use Modules\Xot\Contracts\UserContract;
>>>>>>> d9f8ef0b (.)

class CachePolicy extends XotBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
<<<<<<< HEAD
    #[\Override]
=======
>>>>>>> c4ec0fb6 (.)
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('cache.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
    public function view(UserContract $user, Cache $_cache): bool
=======
    public function view(UserContract $user, Cache $cache): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('cache.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('cache.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $user, Cache $_cache): bool
=======
    public function update(UserContract $user, Cache $cache): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('cache.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $user, Cache $_cache): bool
=======
    public function delete(UserContract $user, Cache $cache): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('cache.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, Cache $_cache): bool
=======
    public function restore(UserContract $user, Cache $cache): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('cache.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Cache $cache): bool
    {
        return $user->hasPermissionTo('cache.forceDelete');
    }
<<<<<<< HEAD
}
<<<<<<< HEAD
=======

<<<<<<< HEAD
>>>>>>> c4ec0fb6 (.)
=======
=======
}
>>>>>>> d9f8ef0b (.)
>>>>>>> fcf6b127 (.)
