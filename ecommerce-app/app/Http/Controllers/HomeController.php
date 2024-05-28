<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;    
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function redirect() {    
        return view('welcome');
    }

    public function dashboard() {
        if (Auth::user()) {
            $userType = Auth::user()->usertype;
            if ($userType === 1) { // ADMIN
                return view('admin.home');
            } else if ($userType === 0) { // NOT ADMIN
                return view('dashboard');
            }
        } else {
            return view('welcome');
        }
    }

    public function index() {
        return view('user-page');
    }
}
