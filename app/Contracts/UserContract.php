<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Laravel\Passport\Token;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Contracts\Role;
use Illuminate\Database\Eloquent\Model;
use Filament\Models\Contracts\FilamentUser;
use Modules\User\Contracts\HasTeamsContract;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\MediaCollections\FileAdder;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Filament\Models\Contracts\HasTenants;

/**
 * Modules\User\Contracts\UserContract.
 *
<<<<<<< HEAD
 * @property ProfileContract|null $profile
 * @property string $id
 * @property string $handle
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property \BackedEnum&\Filament\Support\Contracts\HasLabel $type
 * @property string|null $password
 * @property string|int|null $current_team_id
 * @property string|null $phone
 * @property string|null $email
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Role> $roles
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Tenant> $tenants
 *
 * @method FileAdder addMediaFromDisk(string $key, ?string $disk = null)
 * @method bool canAccessSocialite()
=======
 * @property ProfileContract|null                                                       $profile
 * @property string $id
 * @property string $handle
 * @property string|null                                                                $first_name
 * @property string|null                                                                $last_name
 * @property string|null                                                                $full_name
 * @property \BackedEnum&\Filament\Support\Contracts\HasLabel                           $type
 * @property string|null                                                                $password
 * @property string|int|null                                                            $current_team_id
 * @property string|null                                                                $phone
 * @property string|null                                                                $email
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Role>   $roles
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Tenant> $tenants
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @method FileAdder addMediaFromDisk(string $key, ?string $disk = null)
 * @method bool      canAccessSocialite()
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
=======
 * @method  FileAdder addMediaFromDisk(string $key, ?string $disk = null)
 * @method bool canAccessSocialite()
>>>>>>> b6f6b143 (.)
>>>>>>> f4296aed (.)
=======
 * @method  FileAdder addMediaFromDisk(string $key, ?string $disk = null)
 * @method bool canAccessSocialite()
>>>>>>> e8b26086 (.)
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
interface UserContract extends Authenticatable, Authorizable, CanResetPassword, FilamentUser, HasMedia, HasTeamsContract, ModelContract, MustVerifyEmail, PassportHasApiTokensContract
=======
interface UserContract extends Authenticatable, Authorizable, CanResetPassword, FilamentUser, HasTeamsContract, ModelContract, MustVerifyEmail, PassportHasApiTokensContract, HasMedia
>>>>>>> e697a77b (.)
=======
interface UserContract extends Authenticatable, Authorizable, CanResetPassword, FilamentUser, HasTeamsContract, ModelContract, MustVerifyEmail, PassportHasApiTokensContract, HasMedia
=======
interface UserContract extends Authenticatable, Authorizable, CanResetPassword, FilamentUser, HasTeamsContract, ModelContract, MustVerifyEmail, PassportHasApiTokensContract,HasMedia
>>>>>>> b6f6b143 (.)
>>>>>>> f4296aed (.)
=======
interface UserContract extends Authenticatable, Authorizable, CanResetPassword, FilamentUser, HasTeamsContract, ModelContract, MustVerifyEmail, PassportHasApiTokensContract,HasMedia
>>>>>>> e8b26086 (.)
{
    /*
    public function isSuperAdmin();
    public function name();
    public function areas();
    public function avatar();
    */
    public function profile(): HasOne;

    /**
     * Update the model in the database.
     *
     * @return bool
     */
    /**
     * Get a relationship.
     *
<<<<<<< HEAD
     * @param  string  $key
=======
     * @param string $key
     *
>>>>>>> e697a77b (.)
     * @return mixed|null
     */
    public function getRelationValue($key);

    /**
     * Create a new instance of the given model.
     *
<<<<<<< HEAD
     * @param  array  $attributes
     * @param  bool  $exists
=======
     * @param array $attributes
     * @param bool  $exists
     *
>>>>>>> e697a77b (.)
     * @return static
     */
    public function newInstance($attributes = [], $exists = false);

    /**
     * Get the value of the model's primary key.
     *
     * @return mixed|int|string
     */
    public function getKey();

    /**
     * Determine if the model has (one of) the given role(s).
     */
    public function hasRole(string|int|array|Role|\Illuminate\Support\Collection $roles, ?string $guard = null): bool;

    /**
     * Assign the given role to the model.
     *
     * @return $this
     */
    public function assignRole(array|string|int|Role|\Illuminate\Support\Collection $roles = []);

    /**
     * Revoke the given role from the model.
     *
<<<<<<< HEAD
     * @param  string|int|Role|\BackedEnum  $role
=======
     * @param string|int|Role|\BackedEnum $role
     *
>>>>>>> e697a77b (.)
     * @return self
     */
    public function removeRole($role);
    /**
     * Get the current access token being used by the user.
     *
     * @return Token|\Laravel\Passport\TransientToken|null
     */
    // public function token();

    /**
     * A model may have multiple roles.
     */
    public function roles(): BelongsToMany;

    /**
     * Get all of the tenants the user belongs to.
     */
    public function tenants(): BelongsToMany;

    // public function canAccessSocialite(): bool;

    /**
     * Get all consents for the model (polymorphic).
<<<<<<< HEAD
<<<<<<< HEAD
     */
    // public function consents(): MorphMany;

<<<<<<< HEAD
=======
    /**
     * Check if the user has a specific permission.
     */
    public function hasPermissionTo(string $permission): bool;
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
=======
=======
>>>>>>> e8b26086 (.)
     *
     */
    //public function consents(): MorphMany;
    
<<<<<<< HEAD
>>>>>>> b6f6b143 (.)
>>>>>>> f4296aed (.)
=======
>>>>>>> e8b26086 (.)
}
