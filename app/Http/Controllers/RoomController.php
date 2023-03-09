<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return response()->json($rooms);
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
        /* $hotel = Hotel::findOrFail($request->input('hotel_id'));

        if ($hotel->habitaciones->count() >= $hotel->numero_habitaciones) {
            return response()->json(['error' => 'El hotel no tiene más habitaciones disponibles'], 400);
        } */
        $tipo = $request->input('tipo');
        $accommodation = $this->validarAccommodation($tipo);
        $room = new Room;
        $room->tipo = $tipo;
        $room->acomodacion = $accommodation;
        $room->estado = $request->input('estado');
        $room->hotel_id = 1;
        $room->save();
        return response()->json($room);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::find($id);
        return response()->json($room);
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
        /* $hotel = Hotel::findOrFail($request->input('hotel_id'));

        if ($hotel->habitaciones->count() >= $hotel->numero_habitaciones) {
            return response()->json(['error' => 'El hotel no tiene más habitaciones disponibles'], 400);
        } */
        $tipo = $request->input('tipo');
        $accommodation = $this->validarAccommodation($tipo);
        $room = Room::find($id);
        $room->tipo = $tipo;
        $room->acomodacion = $accommodation;
        $room->estado = $request->input('estado');
        $room->hotel_id = 1;
        $room->save();
        return response()->json($room);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        $room->delete();
        return response()->json(['message' => 'Habitación eliminada']);
    }

    private function validarAccommodation($tipo) {
        if ($tipo == "Estándar") {
            return "El tipo de acomodación es: Sencilla y Doble";
        } elseif ($tipo == "Junior") {
            return ("El tipo de acomodación es: Triple y Cuádruple");
        } elseif ($tipo == "Suite") {
            return ("El tipo de acomodación es: Sencilla, Doble y Triple");
        }
    }
}
