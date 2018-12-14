<?php

namespace Vegvisir\LaratrustCli\Interfaces;

 /**
  * UserInterface that every user model (Eloquent or MongoDB) shoud inherit from
  *
  * @licence GPL
  * @package LaratrustCli
  */
interface UserInterface {

    /**
     * Name of the "email" field
     *
     * @var string
     */
    const PROPERTY_EMAIL = 'email';

    /**
     * Name of the "id" field
     *
     * @var string
     */
    const PROPERTY_KEY = 'id';

    /**
     * Retrieves model the application uses for user model
     */
    public static function getApplicationModel();

}
