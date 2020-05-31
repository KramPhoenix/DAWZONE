<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        $products = Product::where('offer_id', '!=', null)->latest()->paginate(5);


        return view('welcome', [
            'products' => $products
        ]);
    }
}
