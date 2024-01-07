<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return redirect('/redirect/admin-book-main');
            } else {
                return view('homepage');
            }
        }
        else{
            return view('homepage');
        }
    }
}
