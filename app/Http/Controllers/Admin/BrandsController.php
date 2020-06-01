<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('admin.brands.index', [
            'brands' => $brands,
        ]);
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $data = [
            'name' => $request['nombre'],
        ];

        $brand = Brand::create($data);

        return redirect()->route('admin.brands.index');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('admin.brands.edit', [
            'brand' => $brand,
        ]);
    }

    public function update($id, Request $request)
    {
        $brand = Brand::find($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $data = [
            'name' => $request['nombre'],
        ];

        $brand->update($data);
        return redirect()->route('admin.brands.index');
    }

    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect()->route('admin.brands.index');
    }
}
