<?php

namespace Monitor;

class Cases {

    public static function getCases(){
        return Request::doTheRequest('GET', 'API/bpm/case?p=0&c=1000');
    }

    public static function getArchivedCases(){
        return Request::doTheRequest('GET', 'API/bpm/archivedCase?p=0&c=1000');
    }

    public static function getCountCases(){
        $response = Request::doTheRequest('GET', 'API/bpm/case?p=0&c=1000');
        return count($response['data']);
    }

}