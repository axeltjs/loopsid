<?php
namespace App\Http\Controllers;
use Session;

trait TraitSession
{
    /**
     * Session Message
     * 
     * @return Session
     */

    private function message($message, $type = "success")
    {
        Session::flash("flash_notification", [
            "level"=> $type,
            "message"=> $message
        ]);
    }
}
