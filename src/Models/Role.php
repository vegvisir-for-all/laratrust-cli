<?php

namespace Vegvisir\LaratrustCli\Models;

use Laratrust\LaratrustRole;

/**
 * Role model.
 *
 * @licence GPL
 */
class Role extends LaratrustRole
{
    /**
     * Name of the "id" field.
     *
     * @var string
     */
    const PROPERTY_KEY = 'id';

    /**
     * Name of the "name" field.
     *
     * @var string
     */
    const PROPERTY_NAME = 'name';

    /**
     * Name of the "display_name" field.
     *
     * @var string
     */
    const PROPERTY_DISPLAY_NAME = 'display_name';

    /**
     * Name of the "description" field.
     *
     * @var string
     */
    const PROPERTY_DESCRIPTION = 'description';

    /**
     * Fillable fields of model.
     *
     * @var array
     */
    protected $fillable = [
        self::PROPERTY_NAME,
        self::PROPERTY_DISPLAY_NAME,
        self::PROPERTY_DESCRIPTION,
    ];
}
