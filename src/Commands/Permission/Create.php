<?php

namespace Vegvisir\LaratrustCli\Commands\Permission;

use Vegvisir\LaratrustCli\Commands\BaseCommand;
use Vegvisir\LaratrustCli\Models\Permission;

class Create extends BaseCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:permission:create
                            {name : Name of the permission}
                            {display_name? : Display name of the permission}
                            {description? : Description of the permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Laratrust permission';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command
     *
     * @return mixed
     */
    public function handle()
    {
        $permissionName = $this->argument('name');
        $permission = $this->getPermission($permissionName, false);

        if($permission == false) {
            return;
        }

        $displayName = $this->argument('display_name');
        $description = $this->argument('description');

        try {
            Permission::create([
                Permission::PROPERTY_NAME => $permissionName,
                Permission::PROPERTY_DISPLAY_NAME => $displayName,
                Permission::PROPERTY_DESCRIPTION => $description
            ]);

            $this->successCreating('permission', $permissionName);
        } catch (\Exception $e) {
            $this->errorCreating('permission', $permissionName);
        }
    }
}
