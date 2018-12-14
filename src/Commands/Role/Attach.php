<?php

namespace Vegvisir\LaratrustCli\Commands\Role;

use Vegvisir\LaratrustCli\Commands\BaseCommand;

class Attach extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:role:attach
                            {role_name : Name of the role}
                            {identity : Email or username of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a Laratrust role to a user';

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
        $roleName = $this->argument('role_name');
        $role = $this->getRole($roleName, true);

        if (!$role) {
            return;
        }

        $identity = $this->argument('identity');
        $user = $this->getUser($identity);

        if (!$user) {
            return;
        }

        if ($user->hasRole($roleName)) {
            $this->alreadyAttached('role', $roleName, 'user', $identity);

            return;
        }

        try {
            $user->attachRole($role);

            $this->successAttaching('role', $roleName, 'user', $identity);
        } catch (\Exception $e) {
            $this->errorAttaching('role', $roleName, 'user', $identity);
        }
    }
}
