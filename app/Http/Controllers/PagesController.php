<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('client/index');
    }

    public function cart()
    {
        return view('client/shopping_cart');
    }
}
