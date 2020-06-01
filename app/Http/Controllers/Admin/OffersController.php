<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{

    public function index()
    {
        $offers = Offer::all();

        return view('admin.offers.index', [
            'offers' => $offers,
        ]);
    }

    public function create()
    {
        return view('admin.offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'inicio' => 'required|date',
            'final' => 'required|date|after:inicio',
            'descuento_valor' => 'required_without:descuento_porcentual',
            'descuento_porcentual' => 'required_without:descuento_valor',
            'activo' => 'required',
        ]);

        if (isset($request['descuento_valor'])){
            $data = [
                'name' => $request['nombre'],
                'start' => $request['inicio'],
                'end' => $request['final'],
                'value_discount' => $request['descuento_valor'],
                'active' => $request['activo'],
            ];
        } else if(isset($request['descuento_porcentual'])) {
            $data = [
                'name' => $request['nombre'],
                'start' => $request['inicio'],
                'end' => $request['final'],
                'percentage_discount' => $request['descuento_porcentual'],
                'active' => $request['activo'],
            ];
        }


        $offer = Offer::create($data);

        return redirect()->route('admin.offers.index');
    }

    public function edit($id)
    {
        $offer = Offer::find($id);

        return view('admin.offers.edit', [
            'offer' => $offer,
        ]);
    }

    public function update($id, Request $request)
    {
        $offer = Offer::find($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'inicio' => 'required|date',
            'final' => 'required|date|after:inicio',
            'descuento_valor' => 'required_without:descuento_porcentual',
            'descuento_porcentual' => 'required_without:descuento_valor',
            'activo' => 'required',
        ]);

        if (isset($request['descuento_valor'])){
            $data = [
                'name' => $request['nombre'],
                'start' => $request['inicio'],
                'end' => $request['final'],
                'value_discount' => $request['descuento_valor'],
                'percentage_discount' => null,
                'active' => $request['activo'],
            ];
        } else if(isset($request['descuento_porcentual'])) {
            $data = [
                'name' => $request['nombre'],
                'start' => $request['inicio'],
                'end' => $request['final'],
                'value_discount' => null,
                'percentage_discount' => $request['descuento_porcentual'],
                'active' => $request['activo'],
            ];
        }

        $offer->update($data);
        return redirect()->route('admin.offers.index');
    }

    public function destroy($id)
    {
        Offer::destroy($id);
        return redirect()->route('admin.offers.index');
    }

}
