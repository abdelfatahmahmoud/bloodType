<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request){

        if($request->type == 'client'){
            $guardName= 'client';
        }

        else{
            $guardName= 'web';
        }
        return $guardName;
    }

    public function redirect($request){

        if($request->type == 'client'){
            return redirect()->intended(RouteServiceProvider::CLIENT);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
