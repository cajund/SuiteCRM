<?php

if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('service/v4_1/SugarWebServiceImplv4_1.php');
class SugarWebServiceImplv4_1_custom extends SugarWebServiceImplv4_1
{
    /*
     * Returns the session id if authenticated
     *
     * @param string $session
     * @return string $session - false if invalid.
     *
     */

    function example_method($session)
    {
        $GLOBALS['log']->info('Begin: SugarWebServiceImplv4_1_custom->example_method');
        $error = new SoapError();

        //authenticate
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', '', '',  $error))
        {
            $GLOBALS['log']->info('End: SugarWebServiceImplv4_1_custom->example_method.');
            return false;
        }
        return $session;
    }
}
?>