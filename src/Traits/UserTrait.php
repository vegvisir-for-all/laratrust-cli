<?php

namespace Vegvisir\LaratrustCli\Traits;

use Laratrust\Traits\LaratrustUserTrait;

/**
 * Trait for to be used with every package User model
 *
 * @licence GPL
 * @package LaratrustCli
 */
trait UserTrait
{

    use LaratrustUserTrait;

    /**
     * Retrieves name of the User model used by application
     *
     * @return string
     */
    public static function getApplicationModel()
    {
        $className = config('auth.providers.users.model');
        return new $className;
    }

}
