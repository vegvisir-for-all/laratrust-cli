<?php

namespace Vegvisir\LaratrustCli\Proxies;

/**
 * User proxy is responsible for retrieving appropriate User model ORM system
 * which can be Laravel or jenssegers/mongodb Eloquent.
 *
 * @licence GPL
 */
class UserProxy
{
    /**
     * Retrieves name of the appropriate user model ORM, valid with application
     * ORM system.
     *
     * @return false|string
     */
    public static function getUserModel()
    {
        $userModelName = config('laratrust-cli.user_model');

        if (!class_exists($userModelName)) {
            return false;
        }

        return $userModelName;
    }
}
