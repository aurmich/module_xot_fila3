<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Policies;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
=======
>>>>>>> fcf6b127 (.)
=======
>>>>>>> 4b5055e9 (.)
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> c4ec0fb6 (.)
use Modules\Xot\Models\PulseAggregate;

class PulseAggregatePolicy extends XotBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[\Override]
    public function viewAny(UserContract $user): bool
=======
    public function viewAny(ProfileContract $user): bool
>>>>>>> c4ec0fb6 (.)
=======
    public function viewAny(ProfileContract $user): bool
=======
    public function viewAny(UserContract $user): bool
>>>>>>> d9f8ef0b (.)
>>>>>>> fcf6b127 (.)
=======
    public function viewAny(ProfileContract $user): bool
>>>>>>> 4b5055e9 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function view(UserContract $user, PulseAggregate $_pulse_aggregate): bool
=======
    public function view(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> c4ec0fb6 (.)
=======
    public function view(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
=======
    public function view(UserContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> d9f8ef0b (.)
>>>>>>> fcf6b127 (.)
=======
    public function view(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> 4b5055e9 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.view');
    }

    /**
     * Determine whether the user can create models.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function create(UserContract $user): bool
=======
    public function create(ProfileContract $user): bool
>>>>>>> c4ec0fb6 (.)
=======
    public function create(ProfileContract $user): bool
=======
    public function create(UserContract $user): bool
>>>>>>> d9f8ef0b (.)
>>>>>>> fcf6b127 (.)
=======
    public function create(ProfileContract $user): bool
>>>>>>> 4b5055e9 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(UserContract $user, PulseAggregate $_pulse_aggregate): bool
=======
    public function update(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> c4ec0fb6 (.)
=======
    public function update(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
=======
    public function update(UserContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> d9f8ef0b (.)
>>>>>>> fcf6b127 (.)
=======
    public function update(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> 4b5055e9 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function delete(UserContract $user, PulseAggregate $_pulse_aggregate): bool
=======
    public function delete(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> c4ec0fb6 (.)
=======
    public function delete(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
=======
    public function delete(UserContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> d9f8ef0b (.)
>>>>>>> fcf6b127 (.)
=======
    public function delete(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> 4b5055e9 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function restore(UserContract $user, PulseAggregate $_pulse_aggregate): bool
=======
    public function restore(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> c4ec0fb6 (.)
=======
    public function restore(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
=======
    public function restore(UserContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> d9f8ef0b (.)
>>>>>>> fcf6b127 (.)
=======
    public function restore(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> 4b5055e9 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function forceDelete(UserContract $user, PulseAggregate $pulse_aggregate): bool
=======
=======
>>>>>>> fcf6b127 (.)
=======
>>>>>>> 4b5055e9 (.)
    public function forceDelete(ProfileContract $user, PulseAggregate $pulse_aggregate): bool
>>>>>>> c4ec0fb6 (.)
    {
        return $user->hasPermissionTo('pulse_aggregate.forceDelete');
    }
}
