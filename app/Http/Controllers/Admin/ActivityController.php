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

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'duration_minutes'  => 'required|integer|min:1',
            'coach_id'          => 'nullable|exists:coaches,id',
        ]);

        Activity::create($request->only('name', 'duration_minutes', 'coach_id'));

        return redirect()->route('admin.activities.index')->with('success', 'Activité créée avec succès.');
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'duration_minutes'  => 'required|integer|min:1',
            'coach_id'          => 'nullable|exists:coaches,id',
        ]);

        $activity->update($request->only('name', 'duration_minutes', 'coach_id'));

        return redirect()->route('admin.activities.index')->with('success', 'Activité mise à jour avec succès.');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('admin.activities.index')->with('success', 'Activité supprimée avec succès.');
    }
}
