<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.create', [
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'imagen' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'marca' => 'required',
            'categoria' => 'required'
        ]);

        if ($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = time().$imagen->getClientOriginalName();
            $imagen->move(public_path() . '/img/products/' , $nombreImagen);
            $request['imagen'] = $nombreImagen;
        }

        $data = [
            'title' => $request['titulo'],
            'image'  => $request['imagen'],
            'description'  => $request['descripcion'],
            'last_price' => $request['precio'],
            'price'  => $request['precio'],
            'brand_id' => $request['marca'],
            'category_id' => $request['categoria']
        ];

        $product = Product::create($data);

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        $offers = Offer::all();

        return view('admin.products.edit', [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
            'offers' => $offers
        ]);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);

        if ($request['precio'] != $product->price) {
            $product->update(['last_price' => $product->price]);
        }

        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'marca' => 'required',
            'categoria' => 'required',
        ]);


        if($request['oferta'] != -1 && $request['oferta'] != $product->offer_id){
            $offer = Offer::find($request['oferta']);

            if ($offer->value_discount != null) {
                $request['precio'] = $request['precio'] - $offer->value_discount;
            } else {
                $discount = ($request['precio'] * $offer->percentage_discount) / 100;
                $request['precio'] = $request['precio'] - $discount;
            }

        }

        if($request['oferta'] == -1){
            $request['oferta'] = null;

            if ($request['precio'] == $product->price){
                $request['precio'] = $product->last_price;
            }
        }

        if ($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = time().$imagen->getClientOriginalName();
            $imagen->move(public_path() . '/img/products/' , $nombreImagen);
            $request['imagen'] = $nombreImagen;

            $data = [
                'title' => $request['titulo'],
                'image'  => $request['imagen'],
                'description'  => $request['descripcion'],
                'price'  => $request['precio'],
                'brand_id' => $request['marca'],
                'category_id' => $request['categoria'],
                'offer_id' => $request['oferta']
            ];

        } else {
            $data = [
                'title' => $request['titulo'],
                'description'  => $request['descripcion'],
                'price'  => $request['precio'],
                'brand_id' => $request['marca'],
                'category_id' => $request['categoria'],
                'offer_id' => $request['oferta']
            ];
        }

        $product->update($data);
        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index');
    }
}
