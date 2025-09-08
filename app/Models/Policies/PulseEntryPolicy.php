<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 3d1ca073 (.)
use Modules\Xot\Models\PulseEntry;

class PulseEntryPolicy extends XotBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('pulse_entry.viewAny'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(ProfileContract $user, PulseEntry $pulse_entry): bool
    {
        return $user->hasPermissionTo('pulse_entry.view'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('pulse_entry.create'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(ProfileContract $user, PulseEntry $pulse_entry): bool
    {
        return $user->hasPermissionTo('pulse_entry.update'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(ProfileContract $user, PulseEntry $pulse_entry): bool
    {
        return $user->hasPermissionTo('pulse_entry.delete'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(ProfileContract $user, PulseEntry $pulse_entry): bool
    {
        return $user->hasPermissionTo('pulse_entry.restore'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(ProfileContract $user, PulseEntry $pulse_entry): bool
    {
        return $user->hasPermissionTo('pulse_entry.forceDelete'); /** @phpstan-ignore method.nonObject */
    }
}
