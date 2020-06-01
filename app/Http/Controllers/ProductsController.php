<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\UserProductFilter;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $products = Product::where('owner_id', '=', $user->id)->get();

        return view('my_products', [
           'products' => $products
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        $product_brand = Brand::find($product->brand_id);

        return view('product', [
            'product' => $product,
            'product_brand' => $product_brand
        ]);
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('publicate_product', [
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

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
            'category_id' => $request['categoria'],
            'owner_id' => $user->id
        ];

        $product = Product::create($data);

        return redirect()->route('products.index');
    }

    public function offers(){
        $products = Product::where('offer_id', '!=', null)->get();

        return view('offers', [
            'products' => $products,
        ]);
    }


    public function addToFavourite($id){
        $user = auth()->user();
        $user_filters = UserProductFilter::where('user_id', '=', $user->id)->where('product_id', '=', $id)->first();

        $data = [
            'user_id' => $user->id,
            'product_id' => $id,
            'favourite' => 1,
        ];

        if ($user_filters) {
            $user_filters->update($data);
        } else {
            UserProductFilter::create($data);
        }

        return redirect()->back();
    }

    public function valuate($id)
    {
        $product = Product::find($id);
        return view('valuate', [
            'product' => $product
        ]);
    }

    public function addValuation(Request $request, $id)
    {
        $user = auth()->user();
        $user_filters = UserProductFilter::where('user_id', '=', $user->id)->where('product_id', '=', $id)->first();

        $request->validate([
            'valoracion_g' => 'required',
            'valoracion_p' => 'required',
        ]);

        $data = [
            'user_id' => $user->id,
            'product_id' => $id,
            'valuation' => $request['valoracion_p'],
            'stars' => $request['valoracion_g']
        ];

        if ($user_filters) {
            $user_filters->update($data);
        } else {
            UserProductFilter::create($data);
        }

        return redirect()->route('orders.myOrders');
    }

}
