<?php

namespace Vegvisir\LaratrustCli\Traits;

 /**
  * Trait for generating success messages
  *
  * @licence GPL
  * @package LaratrustCli
  */
trait SuccessTrait
{

    /**
     * Outputs a creation success message
     *
     * @param $what string Resource being created type
     * @param $name string Resource being created name
     */
    protected function successCreating($what, $whatName)
    {
        $this->info(\ucfirst($what) . " '$whatName' created successfully. Glad I could help :)");
    }

    /**
     * Outputs a deletion success message
     *
     * @param $what string Resource being created type
     * @param $name string Resource being created name
     */
    protected function successDeleting($what, $whatName)
    {
        $this->info(\ucfirst($what) . " '$whatName' deleted successfully. Glad I could help :)");
    }

    /**
     * Outputs an attaching success message
     *
     * @param $what string Resource being attached type
     * @param $name string Resource being attached name
     * @param $whatTo string Resource being attached to type
     * @param $whatToName string Resource being attached to name
     * @param $teamName string (Optional) Team name
     */
    protected function successAttaching($what, $whatName, $whatTo, $whatToName, $teamName = null)
    {

        $teamInfo = '';

        if($teamName !== null) {
            $teamInfo = " on '$teamName' team";
        }

        $this->info(\ucfirst($what) . " '$whatName' attached successfully to $whatTo '$whatToName'$teamInfo. Glad I could help :)");
    }

    /**
     * Outputs an detaching success message
     *
     * @param $what string Resource being detached type
     * @param $name string Resource being detached name
     * @param $whatTo string Resource being detached from type
     * @param $whatToName string Resource being detached from name
     * @param $teamName string (Optional) Team name
     */
    protected function successDetaching($what, $whatName, $whatTo, $whatToName, $teamName = null)
    {

        $teamInfo = '';

        if($teamName !== null) {
            $teamInfo = " on '$teamName' team";
        }

        $this->info(\ucfirst($what) . " '$whatName' detached successfully from $whatTo '$whatToName'$teamInfo. Glad I could help :)");
    }

}
