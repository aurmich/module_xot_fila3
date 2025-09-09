<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Laravel\Passport\Token;
use Modules\User\Contracts\HasTeamsContract;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;
use Spatie\Permission\Contracts\Role;
=======
=======
>>>>>>> 0d3387f (.)
=======
>>>>>>> c4ec0fb6 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b6f6b143 (.)
=======
=======
>>>>>>> edc8a701 (.)
use Spatie\Permission\Exceptions\GuardDoesNotMatch;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Exceptions\RoleDoesNotExist;

<<<<<<< HEAD
>>>>>>> 0d3387f (.)
=======
>>>>>>> c4ec0fb6 (.)
=======
>>>>>>> edc8a701 (.)

// use Filament\Models\Contracts\HasTenants;

/**
 * Modules\User\Contracts\UserContract.
 *
 * @property ProfileContract|null                                                       $profile
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @property string                                                                     $id
 * @property string                                                                     $handle
=======
 * @property string $id
 * @property string $handle
>>>>>>> b6f6b143 (.)
=======
 * @property string $id
 * @property string $handle
>>>>>>> 0d3387f (.)
=======
 * @property string $id
 * @property string $handle
>>>>>>> c4ec0fb6 (.)
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
<<<<<<< HEAD
 * @method FileAdder addMediaFromDisk(string $key, ?string $disk = null)
 * @method bool      canAccessSocialite()
=======
 * @method  FileAdder addMediaFromDisk(string $key, ?string $disk = null)
 * @method bool canAccessSocialite()
>>>>>>> b6f6b143 (.)
=======
 * @method  FileAdder addMediaFromDisk(string $key, ?string $disk = null)
 * @method bool canAccessSocialite()
>>>>>>> 0d3387f (.)
=======
 * @method  FileAdder addMediaFromDisk(string $key, ?string $disk = null)
 * @method bool canAccessSocialite()
>>>>>>> c4ec0fb6 (.)
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
interface UserContract extends Authenticatable, Authorizable, CanResetPassword, FilamentUser, HasTeamsContract, ModelContract, MustVerifyEmail, PassportHasApiTokensContract, HasMedia
=======
interface UserContract extends Authenticatable, Authorizable, CanResetPassword, FilamentUser, HasTeamsContract, ModelContract, MustVerifyEmail, PassportHasApiTokensContract,HasMedia
>>>>>>> b6f6b143 (.)
=======
interface UserContract extends Authenticatable, Authorizable, CanResetPassword, FilamentUser, HasTeamsContract, ModelContract, MustVerifyEmail, PassportHasApiTokensContract,HasMedia
>>>>>>> 0d3387f (.)
=======
interface UserContract extends Authenticatable, Authorizable, CanResetPassword, FilamentUser, HasTeamsContract, ModelContract, MustVerifyEmail, PassportHasApiTokensContract,HasMedia
>>>>>>> c4ec0fb6 (.)
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
     * @param string $key
     *
     * @return mixed|null
     */
    public function getRelationValue($key);

    /**
     * Create a new instance of the given model.
     *
     * @param array $attributes
     * @param bool  $exists
     *
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
     * @param string|int|Role|\BackedEnum $role
     *
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
<<<<<<< HEAD
     */
    // public function consents(): MorphMany;

    /**
     * Check if the user has a specific permission.
     */
    public function hasPermissionTo(string $permission): bool;
=======
=======
>>>>>>> c4ec0fb6 (.)
     *
     */
    //public function consents(): MorphMany;
<<<<<<< HEAD
    
<<<<<<< HEAD
>>>>>>> b6f6b143 (.)
=======
     *
     */
    //public function consents(): MorphMany;
=======
>>>>>>> edc8a701 (.)

    /**
     * Determine if the role may perform the given permission.
     *
     * @param  string|int|\Spatie\Permission\Contracts\Permission|\BackedEnum  $permission
     *
     * @throws PermissionDoesNotExist|GuardDoesNotMatch
     */
    public function hasPermissionTo($permission, ?string $guardName = null): bool;
<<<<<<< HEAD
>>>>>>> 0d3387f (.)
=======
>>>>>>> c4ec0fb6 (.)
=======
>>>>>>> edc8a701 (.)
}
