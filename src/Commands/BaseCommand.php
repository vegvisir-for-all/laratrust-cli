<?php

 namespace Vegvisir\LaratrustCli\Commands;

 use Illuminate\Console\Command;
 use Vegvisir\LaratrustCli\Models\Permission;
 use Vegvisir\LaratrustCli\Models\Role;
 use Vegvisir\LaratrustCli\Models\Team;
 use Vegvisir\LaratrustCli\Proxies\User as UserProxy;
 use Vegvisir\LaratrustCli\Traits\ErrorTrait;
 use Vegvisir\LaratrustCli\Traits\SuccessTrait;

 /**
  * BaseCommand class is responsible for basic console commands, common for all operations the package provides
  *
  * @licence GPL
  * @package LaratrustCli
  */
 class BaseCommand extends Command
 {

    use ErrorTrait, SuccessTrait;

    /**
     * Loads Role by given name
     *
     * @param string name
     * @param bool shouldExist Set to true if a Role should exist, otherwise - set to false
     * @return false|Role
     */
    protected function getRole($name, $shouldExist)
    {

        $role = Role::query()->where(Role::PROPERTY_NAME, $name)->first();

        if($role == null) {

            if($shouldExist) {

                $this->doesNotExist('role', $name);
                return false;
            }

            return true;

        } elseif (!$shouldExist) {

            $this->alreadyExists('role', $name);
            return false;

        }

        return $role;

    }

    /**
     * Loads Permission by given name
     *
     * @param string name
     * @param bool shouldExist Set to true if a Permission should exist, otherwise - set to false
     * @return false|Permission
     */
    protected function getPermission($name, $shouldExist)
    {

        $permission = Permission::query()->where(Permission::PROPERTY_NAME, $name)->first();

        if($permission == null) {

            if($shouldExist) {

                $this->doesNotExist('permission', $name);
                return false;
            }

            return true;

        } elseif (!$shouldExist) {

            $this->alreadyExists('permission', $name);
            return false;

        }

        return $permission;

    }

    /**
     * Loads Team by given name
     *
     * @param string name
     * @param bool shouldExist Set to true if a Team should exist, otherwise - set to false
     * @return false|Team
     */
    protected function getTeam($name, $shouldExist)
    {

        $team = Team::query()->where(Team::PROPERTY_NAME, $name)->first();

        if($team == null) {

            if($shouldExist) {

                $this->doesNotExist('team', $name);
                return false;
            }

            return true;

        } elseif (!$shouldExist) {

            $this->alreadyExists('team', $name);
            return false;

        }

        return $team;

    }

    /**
     * Loads User by given name (e-mail)
     *
     * @param string email
     * @param bool shouldExist Set to true if a User should exist, otherwise - set to false
     * @return false|User
     */
    protected function getUser($email, $shouldExist = true)
    {

        $modelName = UserProxy::getUserModel();

        if(false == $modelName) {
            $this->error("User model does not exist. Check `user_model` value in `config/laravel-cli.php`");
            return null;
        }

        $proxyModel = new $modelName;

        $userModel = $proxyModel::getApplicationModel();

        $user = $userModel->query()->where('email', $email)->first();

        if($user == null) {

            if($shouldExist) {

                $this->doesNotExist('user', $email);
                return false;
            }

            return true;

        } elseif(!$shouldExist) {

            $this->alreadyExists('user', $email);
            return false;

        }

        return $user;

    }

    /**
     * Checks whether Laratrust functionality is on and - if not - outputs an error message
     *
     * @return bool
     */
    protected function isTeamFunctionalityOn()
    {
        // Checking if team functionality is on
        if(!config('laratrust.use_teams')) {
            $this->noTeamFunctionality();
            return false;
        }

        return true;
    }

 }
