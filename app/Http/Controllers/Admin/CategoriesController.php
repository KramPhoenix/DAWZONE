<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $data = [
            'name' => $request['nombre'],
        ];

        $category = Category::create($data);

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update($id, Request $request)
    {
        $category = Category::find($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $data = [
            'name' => $request['nombre'],
        ];

        $category->update($data);
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categories.index');
    }
}
