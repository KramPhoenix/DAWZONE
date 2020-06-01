<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('admin.news.index', [
            'news' => $news,
        ]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'imagen' => 'required',
            'descripcion' => 'required|string|max:1000',
            'url' => 'required|string|max:255'
        ]);

        if ($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = time().$imagen->getClientOriginalName();
            $imagen->move(public_path() . '/img/news/' , $nombreImagen);
            $request['imagen'] = $nombreImagen;
        }

        $data = [
            'image' => $request['imagen'],
            'title' => $request['titulo'],
            'description' => $request['descripcion'],
            'link' => $request['url'],
        ];


        $news = News::create($data);

        return redirect()->route('admin.news.index');
    }

    public function edit($id)
    {
        $news = News::find($id);

        return view('admin.news.edit', [
            'news' => $news,
        ]);
    }

    public function update($id, Request $request)
    {
        $news = News::find($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'url' => 'required|string|max:255'
        ]);

        if ($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = time().$imagen->getClientOriginalName();
            $imagen->move(public_path() . '/img/news/' , $nombreImagen);
            $request['imagen'] = $nombreImagen;

            $data = [
                'image' => $request['imagen'],
                'title' => $request['titulo'],
                'description' => $request['descripcion'],
                'link' => $request['url'],
            ];

        } else {
            $data = [
                'title' => $request['titulo'],
                'description' => $request['descripcion'],
                'link' => $request['url'],
            ];
        }


        $news->update($data);
        return redirect()->route('admin.news.index');
    }

    public function destroy($id)
    {
        News::destroy($id);
        return redirect()->route('admin.news.index');
    }
}
