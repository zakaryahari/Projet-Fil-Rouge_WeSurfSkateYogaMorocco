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
        $existingTypes = Room::pluck('type')->toArray();
        return view('admin.rooms.index', compact('rooms', 'existingTypes'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'            => 'required|string|max:255|unique:rooms,type',
            'capacity'        => 'nullable|integer|min:1',
            'price_per_night' => 'required|numeric|min:0',
            'total_stock'     => 'required|integer|min:1',
            'is_active'       => 'nullable|boolean',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('type', 'capacity', 'price_per_night', 'total_stock');
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('rooms', 'public');
            $data['image_path'] = $path;
        }

        Room::create($data);

        return redirect()->route('admin.rooms.index')->with('success', 'Chambre créée avec succès.');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'type'            => 'required|string|max:255|unique:rooms,type,' . $room->id,
            'capacity'        => 'nullable|integer|min:1',
            'price_per_night' => 'required|numeric|min:0',
            'total_stock'     => 'required|integer|min:1',
            'is_active'       => 'nullable|boolean',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('type', 'capacity', 'price_per_night', 'total_stock');
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('rooms', 'public');
            $data['image_path'] = $path;
        }

        $room->update($data);

        return redirect()->route('admin.rooms.index')->with('success', 'Chambre mise à jour avec succès.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Chambre supprimée avec succès.');
    }
}
