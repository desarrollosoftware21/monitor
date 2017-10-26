<?php

namespace Monitor;

class Process{

    public static function getAllProcess(){
        $response = Request::doTheRequest('GET', 'API/bpm/process?p=0&c=1000');
        return $response['data'];
    }

    public static function getProcessName($id){
        $response = Request::doTheRequest('GET', 'API/bpm/process/'.$id);
        $process = $response['data'];
        return $process->name;
    }

    public static function getCountProcess(){
        $response = Request::doTheRequest('GET', 'API/bpm/process?p=0&c=1000');
        return count($response['data']);
    }
}