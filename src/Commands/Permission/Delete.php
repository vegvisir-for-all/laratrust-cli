<?php

namespace Vegvisir\LaratrustCli\Commands\Permission;

use Vegvisir\LaratrustCli\Commands\BaseCommand;

class Delete extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:permission:delete
                            {name : Name of the permission}
                            {--soft : Handle the special case of soft delete models with non-cascading deletes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a Laratrust permission';

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
        $permissionName = $this->argument('name');
        $permission = $this->getPermission($permissionName, true);

        if ($permission == false) {
            return;
        }

        try {
            $permission->delete();

            if ($this->option('soft')) {
                $permission->roles()->sync([]);
                $permission->teams()->sync([]);
                $permission->forceDelete();
            }

            $this->successDeleting('permission', $permissionName);
        } catch (\Exception $e) {
            $this->errorDeleting('permission', $permissionName);
        }
    }
}
