<?php

namespace Vegvisir\LaratrustCli\Commands\Role;

use Vegvisir\LaratrustCli\Commands\BaseCommand;
use Vegvisir\LaratrustCli\Models\Role;

class Delete extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:role:delete
                            {name : Name of the role}
                            {--soft : Handle the special case of soft delete models with non-cascading deletes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a Laratrust role';

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
        $name = $this->argument('name');
        $role = $this->getRole($name, true);

        if ($role == null) {
            return;
        }

        try {
            $role->delete();

            if ($this->option('soft')) {
                $role->users()->sync([]);
                $role->permissions()->sync([]);
                $role->teams()->sync([]);
                $role->forceDelete();
            }

            $this->successDeleting('role', $name);
        } catch (\Exception $e) {
            $this->errorDeleting('role', $name);
        }
    }
}
