<?php

namespace Vegvisir\LaratrustCli\Traits;

 /**
  * Trait for generating error messages
  *
  * @licence GPL
  * @package LaratrustCli
  */
trait ErrorTrait
{

    /**
     * Outputs a does-not-exist error message
     *
     * @param $what string Resource type
     * @param $name string Resource name
     */
    protected function doesNotExist($what, $name)
    {
        return $this->error("The $what '$name' does not exist. Sorry :(");
    }

    /**
     * Outputs an already-exists error message
     *
     * @param $what string Resource type
     * @param $name string Resource name
     */
    protected function alreadyExists($what, $name)
    {
        return $this->error("The $what '$name' already exists. Sorry :(");
    }

    /**
     * Outputs a non-attached error message
     *
     * @param $what string Resource being attached type
     * @param $name string Resource being attached name
     * @param $whatTo string Resource being attached to type
     * @param $whatToName string Resource being attached to name
     * @param $teamName string (Optional) Team name
     */
    protected function notAttached($what, $whatName, $whatTo, $whatToName, $teamName = null)
    {

        $teamInfo = '';

        if($teamName !== null) {
            $teamInfo = " on '$teamName' team";
        }

        return $this->error("The $what '$whatName' is not attached to $whatTo '$whatToName'$teamInfo. Sorry :(");
    }

    /**
     * Outputs an already-attached error
     *
     * @param $what string Resource being attached type
     * @param $name string Resource being attached name
     * @param $whatTo string Resource being attached to type
     * @param $whatToName string Resource being attached to name
     * @param $teamName string (Optional) Team name
     */
    protected function alreadyAttached($what, $whatName, $whatTo, $whatToName, $teamName = null)
    {

        $teamInfo = '';

        if($teamName !== null) {
            $teamInfo = " on '$teamName' team";
        }

        return $this->error("The $what '$whatName' is already attached to $whatTo '$whatToName'$teamInfo. Sorry :(");
    }

    /**
     * Outputs a creation error message
     *
     * @param $what string Resource being created type
     * @param $name string Resource being created name
     */
    protected function errorCreating($what, $whatName)
    {
        return $this->error("Error creating $what '$whatName'. Sorry :(");
    }

    /**
     * Outputs a deletion error message
     *
     * @param $what string Resource being deleted type
     * @param $name string Resource being deleted name
     */
    protected function errorDeleting($what, $whatName)
    {
        return $this->error("Error deleting $what '$whatName'. Sorry :(");
    }

    /**
     * Outputs an attaching error message
     *
     * @param $what string Resource being attached type
     * @param $name string Resource being attached name
     * @param $whatTo string Resource being attached to type
     * @param $whatToName string Resource being attached to name
     * @param $teamName string (Optional) Team name
     */
    protected function errorAttaching($what, $whatName, $whatTo, $whatToName, $teamName = null)
    {

        $teamInfo = '';

        if($teamName !== null) {
            $teamInfo = " on '$teamName' team";
        }

        return $this->error("Error attaching $what '$whatName' to $whatTo '$whatToName'$teamInfo. Sorry :(");
    }

    /**
     * Outputs an detaching error message
     *
     * @param $what string Resource being detached type
     * @param $name string Resource being detached name
     * @param $whatTo string Resource being detached from type
     * @param $whatToName string Resource being detached from name
     * @param $teamName string (Optional) Team name
     */
    protected function errorDetaching($what, $whatName, $whatTo, $whatToName, $teamName = null)
    {

        $teamInfo = '';

        if($teamName !== null) {
            $teamInfo = " on '$teamName' team";
        }

        return $this->error("Error detaching $what '$whatName' from $whatTo '$whatToName'$teamInfo. Sorry :(");
    }

    /**
     * Outputs a no-team-functionality error message
     */
    protected function noTeamFunctionality()
    {
        return $this->error('Team functionality is off. Set `use_teams` in `config/laratrust.php` to `on` to turn it on');
    }

}
