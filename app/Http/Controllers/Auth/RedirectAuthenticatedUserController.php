<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUserController extends Controller
{
    public function home(){
        if(auth()->user()->role_id == 1){
            return redirect('/admin-dashboard');
        }
        if (auth()->user()->role_id == 2) {
            return redirect('/dashboard');
        }
        if (auth()->user()->role_id == 3) {
            return redirect('/');
        }
      
        else{
            return auth()->logout();
        }
    }
}
