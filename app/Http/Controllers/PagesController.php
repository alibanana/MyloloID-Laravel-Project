<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    public function home()
    {
        $categories = Http::get(url('/api/categories'))['data'];

        return view('client/index', compact('categories'));
    }

    public function cart()
    {
        $categories = Http::get(url('/api/categories'))['data'];

        return view('client/shopping_cart', compact('categories'));
    }
}
