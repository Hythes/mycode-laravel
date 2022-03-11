<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppResponseProvider extends ServiceProvider
{
 

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('api',function($value,$message,$code = 200){
            return Response::json([
                'status' =>[
                    'message' => $message,
                    'code' => $code
                ],
                'data' => $value
            ],$code);

        });


        Response::macro('error',function($errorMessage,$message,$code){
            return Response::json([
                'status'=>[
                    'message' => $message,
                    'errors'=>$errorMessage,
                    'code'=>$code
                ],
                'data'=>[]
            ],$code);
        });
  

    }
}
