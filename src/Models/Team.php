<?php

namespace Vegvisir\LaratrustCli\Models;

use Laratrust\LaratrustTeam;

/**
 * Team model.
 *
 * @licence GPL
 */
class Team extends LaratrustTeam
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
