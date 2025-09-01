<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Passport\Token;
use Laravel\Passport\TransientToken;

/**
 * @propery \Laravel\Passport\Token|\Laravel\Passport\TransientToken|null $accessToken;
 *
 * @phpstan-require-extends Model
 */
interface PassportHasApiTokensContract
{
    /**
     * Get all of the user's registered OAuth clients.
     *
     * @return HasMany
     */
    public function clients();

    /**
     * Get all of the access tokens for the user.
     *
     * @return HasMany
     */
    public function tokens();

    /**
     * Get the current access token being used by the user.
     *
     * @return Token|TransientToken|null
     */
    public function token();

    /**
     * Determine if the current API token has a given scope.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $scope
=======
     * @param string $scope
     *
>>>>>>> e697a77b (.)
=======
     * @param string $scope
     *
>>>>>>> 89d0c8f4 (.)
     * @return bool
     */
    public function tokenCan($scope);

    /**
     * Create a new personal access token for the user.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $name
=======
     * @param string $name
     *
>>>>>>> e697a77b (.)
=======
     * @param string $name
     *
>>>>>>> 89d0c8f4 (.)
     * @return PersonalAccessTokenResult
     */
    public function createToken($name, array $scopes = []);

    /**
     * Set the current access token for the user.
     *
     * @return $this
     */
    public function withAccessToken(Token|TransientToken $accessToken);
}
