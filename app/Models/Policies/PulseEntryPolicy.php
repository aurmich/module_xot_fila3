<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\PulseEntry;
=======
use Modules\Xot\Models\PulseEntry;
use Modules\Xot\Contracts\UserContract;
>>>>>>> d9f8ef0b (.)

class PulseEntryPolicy extends XotBasePolicy
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
        return $user->hasPermissionTo('pulse_entry.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
    public function view(UserContract $user, PulseEntry $_pulse_entry): bool
=======
    public function view(UserContract $user, PulseEntry $pulse_entry): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('pulse_entry.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('pulse_entry.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $user, PulseEntry $_pulse_entry): bool
=======
    public function update(UserContract $user, PulseEntry $pulse_entry): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('pulse_entry.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $user, PulseEntry $_pulse_entry): bool
=======
    public function delete(UserContract $user, PulseEntry $pulse_entry): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('pulse_entry.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, PulseEntry $_pulse_entry): bool
=======
    public function restore(UserContract $user, PulseEntry $pulse_entry): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('pulse_entry.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, PulseEntry $pulse_entry): bool
    {
        return $user->hasPermissionTo('pulse_entry.forceDelete');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> d9f8ef0b (.)
