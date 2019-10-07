<?php

namespace servicos\Http\Controllers;

use Illuminate\Http\Request;

class config extends Controller
{
    public static function formataData($data){
        if( strlen($data) > 10 ){
            $data = substr($data, 0, 10);
        }
        $data = explode("-",explode(" ",$data)[0]);
        return $data[2]."/".$data[1]."/".$data[0];
    }
    
    public static function formataDataBase($data){
        if( strlen($data) > 10 ){
            $data = substr($data, 0, 10);
        }
        $data = explode("/",explode(" ",$data)[0]);
        return $data[2]."-".$data[1]."-".$data[0];
    }
    
    public static function formataHora($data){
        return substr($data, 10, strlen($data));
    }
}
