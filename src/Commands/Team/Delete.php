<?php

namespace Vegvisir\LaratrustCli\Commands\Team;

use Vegvisir\LaratrustCli\Commands\BaseCommand;
use Vegvisir\LaratrustCli\Models\Team;

class Delete extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:team:delete
                            {name : Name of the team}
                            {--soft : Handle the special case of soft delete models with non-cascading deletes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a Laratrust team';

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

        $name = $this->argument('name');
        $team = $this->getTeam($name, true);

        if (!$team) {
            return;
        }

        try {
            $team->delete();

            if ($this->option('soft')) {
                $team->roles()->sync([]);
                $team->permissions()->sync([]);
                $team->forceDelete();
            }

            $this->successDeleting('team', $name);
        } catch (\Exception $e) {
            $this->errorDeleting('team', $name);
        }
    }
}
