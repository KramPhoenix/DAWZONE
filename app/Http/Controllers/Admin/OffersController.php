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
        $input = $request->validate([
            'nombre' => 'required|string|max:255',
            'inicio' => 'required|date',
            'final' => 'required|date|after:inicio',
            'descuento_valor' => 'required_without:descuento_porcentual',
            'descuento_porcentual' => 'required_without:descuento_valor',
            'activo' => 'required',
        ]);

        if (isset($input['descuento_valor'])){
            $data = [
                'name' => $input['nombre'],
                'start' => $input['inicio'],
                'end' => $input['final'],
                'value_discount' => $input['descuento_valor'],
                'active' => $input['activo'],
            ];
        } else if(isset($input['descuento_porcentual'])) {
            $data = [
                'name' => $input['nombre'],
                'start' => $input['inicio'],
                'end' => $input['final'],
                'percentage_discount' => $input['descuento_porcentual'],
                'active' => $input['activo'],
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

        $input = $request->validate([
            'nombre' => 'required|string|max:255',
            'inicio' => 'required|date',
            'final' => 'required|date|after:inicio',
            'descuento_valor' => 'required_without:descuento_porcentual',
            'descuento_porcentual' => 'required_without:descuento_valor',
            'activo' => 'required',
        ]);

        if (isset($input['descuento_valor'])){
            $data = [
                'name' => $input['nombre'],
                'start' => $input['inicio'],
                'end' => $input['final'],
                'value_discount' => $input['descuento_valor'],
                'percentage_discount' => null,
                'active' => $input['activo'],
            ];
        } else if(isset($input['descuento_porcentual'])) {
            $data = [
                'name' => $input['nombre'],
                'start' => $input['inicio'],
                'end' => $input['final'],
                'value_discount' => null,
                'percentage_discount' => $input['descuento_porcentual'],
                'active' => $input['activo'],
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
