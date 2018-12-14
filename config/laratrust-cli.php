<?php

return [

    /*
     * Define User model to be used. Default, it points to UserEloquent, which is
     * applicable for Eloquent-based applications.
     *
     * Currently, vegvisir\laratrust-cli supports also UserJenssegersMongodb
     */
    'user_model' => '\Vegvisir\LaratrustCli\Models\User\UserEloquent',

];
