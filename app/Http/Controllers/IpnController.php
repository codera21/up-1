<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Schema;
// Request & Response
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Log;


class IpnController extends Controller
{

    public function ipn(Request $request)
    {
        //$date = new Date();
        Log::info('this is ipn testing');
        $ipn = new \App\Libs\PaypalIPN();
        // Use the sandbox endpoint during testing.
        $ipn->useSandbox();
        $ipn->usePHPCerts();
        $verified = $ipn->verifyIPN();
        if ($verified) {
            /*
             * Process IPN
             * A list of variables is available here:
             * https://developer.paypal.com/webapps/developer/docs/classic/ipn/integration-guide/IPNandPDTVariables/
             */
            foreach($_POST as $key=>$value){
                Log::info('Key: '. $key .' - Value: '.$value);
            }

        }
        // Reply with an empty 200 response to indicate to paypalController the IPN was received correctly.
        header("HTTP/1.1 200 OK");
    }
    public function smp($query)
    {
        echo $query;
        $data = DB::table($query)->get();
        dd($data);
    }
    public function smp1($query)
    {
        echo $query;
        DB::table($query)->truncate();
    }
}
