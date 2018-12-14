<?php

namespace Vegvisir\LaratrustCli\Commands\Permission;

use Vegvisir\LaratrustCli\Commands\BaseCommand;

class Attach extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:permission:attach
                            {permission_name : Name of permission to attach}
                            {role_name : Name of role to attach permission to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attach permision to Laratrust role';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $permissionName = $this->argument('permission_name');
        $roleName = $this->argument('role_name');

        $permission = $this->getPermission($permissionName, true);
        if (!$permission) {
            return;
        }

        $role = $this->getRole($roleName, true);
        if (!$role) {
            return;
        }

        if ($role->hasPermission($permissionName)) {
            $this->alreadyAttached('permission', $permissionName, 'role', $roleName);

            return;
        }

        try {
            $role->attachPermission($permission);
            $this->successAttaching('permission', $permissionName, 'role', $roleName);
        } catch (\Exception $e) {
            $this->errorAttaching('permission', $permissionName, 'role', $roleName);
        }
    }
}
