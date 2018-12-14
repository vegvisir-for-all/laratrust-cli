<?php

namespace Vegvisir\LaratrustCli\Commands\Team;

use Vegvisir\LaratrustCli\Commands\BaseCommand;

class Detach extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:team:detach
                            {role_name : Name of the role}
                            {team_name : Name of the team}
                            {identity : Email or username of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Detach a Laratrust role from a user within a team';

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
        if (!parent::isTeamFunctionalityOn()) {
            return;
        }

        $roleName = $this->argument('role_name');
        $role = $this->getRole($roleName, true);

        if (!$role) {
            return;
        }

        $identity = $this->argument('identity');
        $user = $this->getUser($identity, true);

        if (!$user) {
            return;
        }

        $teamName = $this->argument('team_name');
        $team = $this->getTeam($teamName, true);

        if (!$team) {
            return;
        }

        if (!$user->hasRole($roleName, $teamName)) {
            $this->notAttached('role', $roleName, 'user', $identity, $teamName);

            return;
        }

        try {
            $user->detachRole($role, $teamName);

            $this->successDetaching('role', $roleName, 'user', $identity, $teamName);
        } catch (\Exception $e) {
            $this->errorDetaching('role', $roleName, 'user', $identity, $teamName);
        }
    }
}
