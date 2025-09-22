<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Session;
=======
use Modules\Xot\Models\Session;
use Modules\Xot\Contracts\UserContract;
>>>>>>> d9f8ef0b (.)

class SessionPolicy extends XotBasePolicy
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
        return $user->hasPermissionTo('session.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
    public function view(UserContract $user, Session $_session): bool
=======
    public function view(UserContract $user, Session $session): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('session.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('session.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $user, Session $_session): bool
=======
    public function update(UserContract $user, Session $session): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('session.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $user, Session $_session): bool
=======
    public function delete(UserContract $user, Session $session): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('session.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, Session $_session): bool
=======
    public function restore(UserContract $user, Session $session): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('session.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Session $session): bool
    {
        return $user->hasPermissionTo('session.forceDelete');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> d9f8ef0b (.)
