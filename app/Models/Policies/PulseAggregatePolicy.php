<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Models\PulseAggregate;
use Modules\Xot\Contracts\UserContract;
=======
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Models\PulseAggregate;
>>>>>>> c4ec0fb6 (.)

class PulseAggregatePolicy extends XotBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
<<<<<<< HEAD
    public function viewAny(UserContract $user): bool
=======
    public function viewAny(ProfileContract $user): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
    public function view(UserContract $user, PulseAggregate $pulse_aggregate): bool
=======
    public function view(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.view');
    }

    /**
     * Determine whether the user can create models.
     */
<<<<<<< HEAD
    public function create(UserContract $user): bool
=======
    public function create(ProfileContract $user): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $user, PulseAggregate $pulse_aggregate): bool
=======
    public function update(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $user, PulseAggregate $pulse_aggregate): bool
=======
    public function delete(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, PulseAggregate $pulse_aggregate): bool
=======
    public function restore(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
<<<<<<< HEAD
    public function forceDelete(UserContract $user, PulseAggregate $pulse_aggregate): bool
    {
        return $user->hasPermissionTo('pulse_aggregate.forceDelete');
    }
}
=======
    public function forceDelete(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
    {
        return $user->hasPermissionTo('pulse_aggregate.forceDelete');
    }
}
>>>>>>> c4ec0fb6 (.)
