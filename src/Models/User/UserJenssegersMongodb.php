<?php

namespace Vegvisir\LaratrustCli\Models\User;

use Jenssegers\Mongodb\Eloquent\Model;
use Vegvisir\LaratrustCli\Interfaces\UserInterface;
use Vegvisir\LaratrustCli\Traits\UserTrait;

 /**
  * User model for jenssegers/mongodb ORM
  *
  * @licence GPL
  * @package LaratrustCli
  */
class UserJenssegersMongodb extends Model implements UserInterface
{
    use UserTrait;
}
