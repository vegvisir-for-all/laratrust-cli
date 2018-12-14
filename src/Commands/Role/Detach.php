<?php

namespace Vegvisir\LaratrustCli\Commands\Role;

use Vegvisir\LaratrustCli\Commands\BaseCommand;

class Detach extends BaseCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:role:detach
                            {role_name : Name of the role}
                            {identity : Email or username of the user}
                            {--attr= : Manually set identify attribute}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Detach a Laratrust role from a user';

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
        $roleName = $this->argument('role_name');
        $role = $this->getRole($roleName, true);

        if(!$role) {
            return;
        }

        $identity = $this->argument('identity');
        $user = $this->getUser($identity, true);

        if(!$user) {
            return;
        }

        if(!$user->hasRole($roleName)) {
            $this->notAttached('role', $roleName, 'user', $identity);
            return;
        }

        try {
            $user->detachRole($role);
            $this->successDetaching('role', $roleName, 'user', $identity);
        } catch (\Exception $e) {
            $this->errorDetaching('role', $roleName, 'user', $identity);
        }
    }
}
