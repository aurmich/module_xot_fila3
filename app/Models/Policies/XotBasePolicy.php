<?php

declare(strict_types=1);

/**
 * ----------------------------------------------------------------.
 */

namespace Modules\Xot\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Xot\Contracts\ProfileContract;

// use Modules\Xot\Datas\XotData;

abstract class XotBasePolicy
{
    use HandlesAuthorization;

    public function before(ProfileContract $user, string $ability): ?bool
    {
        return once(function () use ($user) {
            if ($user->hasRole('super-admin')/** @phpstan-ignore method.nonObject */) {
                return true;
            }

            return null;
        });
    }

    public function viewAny(ProfileContract $userContract): bool
    {
        return false;
    }
}
