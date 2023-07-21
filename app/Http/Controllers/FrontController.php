<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home ()
    {
        return view('front.page.home', [
            'products'  => Product::where('status', 1)->get()
        ]);
    }
    public function details ($id)
    {
        return view('front.page.details', [
            'product'   => Product::find($id),
        ]);
    }
}
