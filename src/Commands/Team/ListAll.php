<?php

namespace Vegvisir\LaratrustCli\Commands\Team;

use Vegvisir\LaratrustCli\Commands\BaseCommand;
use Vegvisir\LaratrustCli\Models\Team;

class ListAll extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:team:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lists all Laratrust teams';

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

        $headers = [
            'ID', 'Name', 'Display name', 'Description',
        ];

        $teams = Team::all(
            Team::PROPERTY_KEY,
            Team::PROPERTY_NAME,
            Team::PROPERTY_DISPLAY_NAME,
            Team::PROPERTY_DESCRIPTION
        )->toArray();

        $this->table($headers, $teams);
    }
}
