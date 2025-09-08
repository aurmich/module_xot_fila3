<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 3d1ca073 (.)
use Modules\Xot\Models\HealthCheckResultHistoryItem;

class HealthCheckResultHistoryItemPolicy extends XotBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('health_check_result_history_item.viewAny'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(ProfileContract $user, HealthCheckResultHistoryItem $health_check_result_history_item): bool
    {
        return $user->hasPermissionTo('health_check_result_history_item.view'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('health_check_result_history_item.create'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(ProfileContract $user, HealthCheckResultHistoryItem $health_check_result_history_item): bool
    {
        return $user->hasPermissionTo('health_check_result_history_item.update'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(ProfileContract $user, HealthCheckResultHistoryItem $health_check_result_history_item): bool
    {
        return $user->hasPermissionTo('health_check_result_history_item.delete'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(ProfileContract $user, HealthCheckResultHistoryItem $health_check_result_history_item): bool
    {
        return $user->hasPermissionTo('health_check_result_history_item.restore'); /** @phpstan-ignore method.nonObject */
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(ProfileContract $user, HealthCheckResultHistoryItem $health_check_result_history_item): bool
    {
        return $user->hasPermissionTo('health_check_result_history_item.forceDelete'); /** @phpstan-ignore method.nonObject */
    }
}
