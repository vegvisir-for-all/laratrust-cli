<?php

namespace Vegvisir\LaratrustCli\Commands\Role;

use Vegvisir\LaratrustCli\Commands\BaseCommand;
use Vegvisir\LaratrustCli\Models\Role;

class ListAll extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:role:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lists all Laratrust roles';

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
        $headers = [
            'ID', 'Name', 'Display name', 'Description',
        ];

        $roles = Role::all(
            Role::PROPERTY_KEY,
            Role::PROPERTY_NAME,
            Role::PROPERTY_DISPLAY_NAME,
            Role::PROPERTY_DESCRIPTION
        )->toArray();

        $this->table($headers, $roles);
    }
}
