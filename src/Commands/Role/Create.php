<?php

namespace Vegvisir\LaratrustCli\Commands\Role;

use Vegvisir\LaratrustCli\Commands\BaseCommand;
use Vegvisir\LaratrustCli\Models\Role;

class Create extends BaseCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratrust-cli:role:create
                            {name : Name of the role}
                            {display_name? : Display name of the role}
                            {description? : Description of the role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Laratrust role';

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
        $name = $this->argument('name');
        $role = $this->getRole($name, false);

        if(!$role) {
            return;
        }

        $displayName = $this->argument('display_name');
        $description = $this->argument('description');

        try {
            Role::create([
                Role::PROPERTY_NAME => $name,
                Role::PROPERTY_DISPLAY_NAME => $displayName,
                Role::PROPERTY_DESCRIPTION => $description
            ]);

            dd($this->successCreating('role', $name));
        } catch (\Exception $e) {
            $this->errorCreating('role', $name);
        }
    }
}
