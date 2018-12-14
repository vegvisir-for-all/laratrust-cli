<?php

namespace Vegvisir\LaratrustCli;

use Illuminate\Support\ServiceProvider;

class LaratrustCliServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->publishes([
            __DIR__.'/../config/laratrust-cli.php' => config_path('laratrust-cli.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->registerPermissionCommands();
        $this->registerRoleCommands();
        $this->registerTeamCommands();
    }

    protected function registerPermissionCommands()
    {
        $this->app->singleton('command.laratrust-cli.permission.attach', function () {
            return new Commands\Permission\Attach();
        });

        $this->app->singleton('command.laratrust-cli.permission.create', function () {
            return new Commands\Permission\Create();
        });

        $this->app->singleton('command.laratrust-cli.permission.delete', function () {
            return new Commands\Permission\Delete();
        });

        $this->app->singleton('command.laratrust-cli.permission.detach', function () {
            return new Commands\Permission\Detach();
        });

        $this->app->singleton('command.laratrust-cli.permission.list', function () {
            return new Commands\Permission\ListAll();
        });

        $this->commands([
            'command.laratrust-cli.permission.attach',
            'command.laratrust-cli.permission.create',
            'command.laratrust-cli.permission.delete',
            'command.laratrust-cli.permission.detach',
            'command.laratrust-cli.permission.list',
        ]);
    }

    protected function registerRoleCommands()
    {
        $this->app->singleton('command.laratrust-cli.role.attach', function () {
            return new Commands\Role\Attach();
        });

        $this->app->singleton('command.laratrust-cli.role.create', function () {
            return new Commands\Role\Create();
        });

        $this->app->singleton('command.laratrust-cli.role.delete', function () {
            return new Commands\Role\Delete();
        });

        $this->app->singleton('command.laratrust-cli.role.detach', function () {
            return new Commands\Role\Detach();
        });

        $this->app->singleton('command.laratrust-cli.role.list', function () {
            return new Commands\Role\ListAll();
        });

        $this->commands([
            'command.laratrust-cli.role.attach',
            'command.laratrust-cli.role.create',
            'command.laratrust-cli.role.delete',
            'command.laratrust-cli.role.detach',
            'command.laratrust-cli.role.list',
        ]);
    }

    protected function registerTeamCommands()
    {
        $this->app->singleton('command.laratrust-cli.team.attach', function () {
            return new Commands\Team\Attach();
        });

        $this->app->singleton('command.laratrust-cli.team.create', function () {
            return new Commands\Team\Create();
        });

        $this->app->singleton('command.laratrust-cli.team.delete', function () {
            return new Commands\Team\Delete();
        });

        $this->app->singleton('command.laratrust-cli.team.detach', function () {
            return new Commands\Team\Detach();
        });

        $this->app->singleton('command.laratrust-cli.team.list', function () {
            return new Commands\Team\ListAll();
        });

        $this->commands([
            'command.laratrust-cli.team.attach',
            'command.laratrust-cli.team.create',
            'command.laratrust-cli.team.delete',
            'command.laratrust-cli.team.detach',
            'command.laratrust-cli.team.list',
        ]);
    }
}
