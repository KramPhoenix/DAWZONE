<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show($id)
    {

        $products = Product::where('category_id', '=', $id)->get();


        return view('category', [
            'products' => $products
        ]);

    }
}
