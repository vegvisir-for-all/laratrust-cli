<?php

namespace Vegvisir\LaratrustCli\Models\User;

use Illuminate\Database\Eloquent\Model;
use Vegvisir\LaratrustCli\Interfaces\UserInterface;
use Vegvisir\LaratrustCli\Traits\UserTrait;

/**
 * User model for Laravel Eloquent ORM.
 *
 * @licence GPL
 */
class UserEloquent extends Model implements UserInterface
{
    use UserTrait;
}
