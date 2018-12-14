<?php

namespace Vegvisir\LaratrustCli\Commands\Team;

use Vegvisir\LaratrustCli\Commands\BaseCommand;
use Vegvisir\LaratrustCli\Models\Team;

class Create extends BaseCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:team:create
                            {name : Name of the team}
                            {display_name? : Display name of the team}
                            {description? : Description of the team}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Laratrust team';

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

        if(!parent::isTeamFunctionalityOn()) {
            return null;
        }

        $name = $this->argument('name');
        $team = $this->getTeam($name, false);

        if(!$team) {
            return;
        }

        $displayName = $this->argument('display_name');
        $description = $this->argument('description');

        try {
            Team::create([
                Team::PROPERTY_NAME => $name,
                Team::PROPERTY_DISPLAY_NAME => $displayName,
                Team::PROPERTY_DESCRIPTION => $description
            ]);

            $this->successCreating('team', $name);
        } catch (\Exception $e) {
            $this->errorCreating('team', $name);
        }
    }
}
