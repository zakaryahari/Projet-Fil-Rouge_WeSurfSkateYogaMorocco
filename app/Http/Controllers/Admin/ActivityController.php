<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Coach;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::with('coach')->latest()->paginate(10);
        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        $coaches = Coach::orderBy('name')->get();
        return view('admin.activities.create', compact('coaches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric|min:0',
            'is_extra' => 'boolean',
            'coach_id' => 'nullable|exists:coaches,id',
        ]);

        Activity::create([
            'name'     => $request->name,
            'price'    => $request->price,
            'is_extra' => $request->boolean('is_extra'),
            'coach_id' => $request->coach_id,
        ]);

        return redirect()->route('admin.activities.index')->with('success', 'Activité créée avec succès.');
    }

    public function edit(Activity $activity)
    {
        $coaches = Coach::orderBy('name')->get();
        return view('admin.activities.edit', compact('activity', 'coaches'));
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric|min:0',
            'is_extra' => 'boolean',
            'coach_id' => 'nullable|exists:coaches,id',
        ]);

        $activity->update([
            'name'     => $request->name,
            'price'    => $request->price,
            'is_extra' => $request->boolean('is_extra'),
            'coach_id' => $request->coach_id,
        ]);

        return redirect()->route('admin.activities.index')->with('success', 'Activité mise à jour avec succès.');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('admin.activities.index')->with('success', 'Activité supprimée avec succès.');
    }
}
