<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        $bookData = Book::all();
        if(Auth::check()){
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return redirect('/redirect/admin-book-main');
            } else {
                return view('homepage', compact('bookData'));
            }
        }
        else{
            return view('homepage', compact('bookData'));
        }
    }
}
