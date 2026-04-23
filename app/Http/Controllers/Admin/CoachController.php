<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::latest()->paginate(10);
        return view('admin.coaches.index', compact('coaches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'specialty'         => 'required|string|max:255',
            'years_experience'  => 'required|integer|min:0',
        ]);

        Coach::create($request->only('name', 'specialty', 'years_experience'));

        return redirect()->route('admin.coaches.index')->with('success', 'Coach créé avec succès.');
    }

    public function update(Request $request, Coach $coach)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'specialty'         => 'required|string|max:255',
            'years_experience'  => 'required|integer|min:0',
        ]);

        $coach->update($request->only('name', 'specialty', 'years_experience'));

        return redirect()->route('admin.coaches.index')->with('success', 'Coach mis à jour avec succès.');
    }

    public function destroy(Coach $coach)
    {
        $coach->delete();
        return redirect()->route('admin.coaches.index')->with('success', 'Coach supprimé avec succès.');
    }
}
