<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;    
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //
    public function viewCategory() {
        if (Auth::user()) {
            $userType = Auth::user()->usertype;
            if ($userType === 1) { // ADMIN
                return view('admin.category-view');
            } else if ($userType === 0) { // NOT ADMIN
                return view('home');
            }
        } else {
            return view('login');
        }
    }
}
