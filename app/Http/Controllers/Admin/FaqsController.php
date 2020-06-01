<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        $faqs = Faqs::all();

        return view('admin.faqs.index', [
            'faqs' => $faqs,
        ]);
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pregunta' => 'required|string|max:255',
            'respuesta' => 'required',
        ]);

        $data = [
            'question' => $request['pregunta'],
            'answer' => $request['respuesta']
        ];


        $faqs = Faqs::create($data);

        return redirect()->route('admin.faqs.index');
    }

    public function edit($id)
    {
        $faq = Faqs::find($id);

        return view('admin.faqs.edit', [
            'faq' => $faq,
        ]);
    }

    public function update($id, Request $request)
    {
        $faq = Faqs::find($id);

        $request->validate([
            'pregunta' => 'required|string|max:255',
            'respuesta' => 'required',
        ]);

        $data = [
            'question' => $request['pregunta'],
            'answer' => $request['respuesta']
        ];

        $faq->update($data);
        return redirect()->route('admin.faqs.index');
    }

    public function destroy($id)
    {
        Faqs::destroy($id);
        return redirect()->route('admin.faqs.index');
    }
}
