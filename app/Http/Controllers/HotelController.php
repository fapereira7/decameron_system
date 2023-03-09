<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();
        return response()->json($hotels);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    
        $hotel = new Hotel();
        $hotel->nombre = $request->input('nombre');
        $hotel->direccion = $request->input('direccion');
        $hotel->ciudad = $request->input('ciudad');
        $hotel->nit = $request->input('nit');
        $hotel->numero_habitaciones = $request->input('numero_habitaciones');
        $hotel->estado = $request->input('estado');
        $hotel->save();
    
        return response()->json($hotel);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        return response()->json($hotel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->nombre = $request->input('nombre');
        $hotel->direccion = $request->input('direccion');
        $hotel->ciudad = $request->input('ciudad');
        $hotel->nit = $request->input('nit');
        $hotel->numero_habitaciones = $request->input('numero_habitaciones');
        $hotel->estado = $request->input('estado');
        $hotel->save();

        return response()->json($hotel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return response()->json(['message' => 'Hotel eliminado']);
    }
}
