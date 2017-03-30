<?php

class Conditions {

    public function getConditions() {
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://www.promet.si/dc/PROMET.ROADEVENTS.PP.RSS.SL'
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        if(!curl_exec($curl)){
            die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
        }
        // Close request to clear up some resources
        curl_close($curl);
        $xml = new SimpleXMLElement($resp);
        $events = [];
        $reg = "/A1/";

        foreach($xml->entry as $e){
            if(preg_match($reg, $e->title)){
                $events[] = $e;
            }
        }

        return $events;
    }

}
//$c = new Conditions();
//$c->getConditions();
require_once 'index.view.php';