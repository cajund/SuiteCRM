<?php


if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('service/v4_1/SugarWebServiceImplv4_1.php');

class WaveInvoice extends SugarWebServiceImplv4_1
{


    function sendInvoice($session, $id)
    {

        $GLOBALS['log']->warn('Begin: WaveInvoice->sendInvoice');
        $GLOBALS['log']->warn('$session: '.$session);
        $GLOBALS['log']->warn('$id: '.$id);

//        $error = new SoapError();

        //authenticate
//        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', 'sendInvoice', '', '',  $error))
//        {
//            $GLOBALS['log']->info('End: WaveInvoice->sendInvoice.');
//            return $session;
//        }


        return $this->buildInvoice($id);
    }

    function buildInvoice($id=null) {

        if(empty($id)) {
            return "No Invoice ID";
        }

        $sql = "select * from aos_invoices where id = '" .$id. "'";

        $result = $GLOBALS['db']->query($sql);

        while($row = $GLOBALS['db']->fetchByAssoc($result) )
        {
            $GLOBALS['log']->warn(print_r($row, true));
            $sql = "select * from aos_line_item_groups where parent_id = '" .$id. "'";
            $line_result = $GLOBALS['db']->query($sql);

            while($line = $GLOBALS['db']->fetchByAssoc($line_result) ) {

                $GLOBALS['log']->warn(print_r($line, true));

            }

        }

        return "Invoice Sent Successfully";
    }

    function sendToWave($data) {



    }

}