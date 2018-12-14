<?php

namespace Vegvisir\LaratrustCli\Commands\Permission;

use Vegvisir\LaratrustCli\Commands\BaseCommand;
use Vegvisir\LaratrustCli\Models\Permission;

class ListAll extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:permission:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lists all Laratrust permissions';

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

        $permissions = Permission::all(
            Permission::PROPERTY_KEY,
            Permission::PROPERTY_NAME,
            Permission::PROPERTY_DISPLAY_NAME,
            Permission::PROPERTY_DESCRIPTION
        )->toArray();

        $this->table($headers, $permissions);
    }
}
