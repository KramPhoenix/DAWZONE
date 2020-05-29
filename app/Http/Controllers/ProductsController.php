<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);

        $product_brand = Brand::find($product->brand_id);

        return view('product', [
            'product' => $product,
            'product_brand' => $product_brand
        ]);
    }

    public function addToFavourite($product, $user){

    }

}
