<?php

namespace servicos\Http\Controllers;

use Illuminate\Http\Request;

class auth extends Controller
{
    private static $secret_key = "apiacs2018";
    private static $encrypt = ['HS256'];
    private static $aud = null;
    
    public static function login($data){
        $time = time();
        $token = [
          'exp' => $time + (60*60),
          'data' => $data
        ];
        
        return \Firebase\JWT\JWT::encode($token, self::$secret_key);
    }
    
    public static function check($token){
        if( empty($token) ){
            return null;
        }
        $decode = \Firebase\JWT\JWT::decode($token, self::$secret_key, self::$encrypt);
        $decode = json_encode($decode);
        $decode = json_decode($decode, true);
        return $decode['data'];
    }
}
