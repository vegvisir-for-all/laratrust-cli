<?php

namespace Vegvisir\LaratrustCli\Commands\Permission;

use Vegvisir\LaratrustCli\Commands\BaseCommand;

class Detach extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:permission:detach
                            {permission_name : Name of permission to detach}
                            {role_name : Name of role to detach permission from}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Detach permision from Laratrust role';

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

        if (!$role->hasPermission($permissionName)) {
            $this->notAttached('permission', $permissionName, 'role', $roleName);

            return;
        }

        try {
            $role->detachPermission($permission);
            $this->successDetaching('permission', $permissionName, 'role', $roleName);
        } catch (\Exception $e) {
            $this->errorDetaching('permission', $permissionName, 'role', $roleName);
        }
    }
}
