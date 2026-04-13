<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->paginate(10);
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'            => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'total_stock'     => 'required|integer|min:1',
        ]);

        Room::create($request->only('type', 'price_per_night', 'total_stock'));

        return redirect()->route('admin.rooms.index')->with('success', 'Chambre créée avec succès.');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'type'            => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'total_stock'     => 'required|integer|min:1',
        ]);

        $room->update($request->only('type', 'price_per_night', 'total_stock'));

        return redirect()->route('admin.rooms.index')->with('success', 'Chambre mise à jour avec succès.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Chambre supprimée avec succès.');
    }
}
