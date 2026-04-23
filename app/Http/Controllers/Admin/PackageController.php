<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('activities')->latest()->paginate(10);
        $activities = Activity::all();
        return view('admin.packages.index', compact('packages', 'activities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
            'duration_days' => 'required|integer|min:1',
            'base_price'    => 'required|numeric|min:0',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'activity_ids'  => 'nullable|array',
            'activity_ids.*' => 'exists:activities,id',
            'sessions'      => 'nullable|array',
        ]);

        $data = $request->only('name', 'description', 'duration_days', 'base_price');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('packages', 'public');
            $data['image_path'] = $path;
        }

        $package = Package::create($data);

        // Sync activities with pivot data (included_sessions)
        if ($request->activity_ids) {
            $syncData = collect($request->activity_ids)->mapWithKeys(function ($activityId) use ($request) {
                return [
                    $activityId => [
                        'included_sessions' => $request->sessions[$activityId] ?? 0
                    ]
                ];
            })->toArray();

            $package->activities()->sync($syncData);
        }

        return redirect()->route('admin.packages.index')->with('success', 'Package créé avec succès.');
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
            'duration_days' => 'required|integer|min:1',
            'base_price'    => 'required|numeric|min:0',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'activity_ids'  => 'nullable|array',
            'activity_ids.*' => 'exists:activities,id',
            'sessions'      => 'nullable|array',
        ]);

        $data = $request->only('name', 'description', 'duration_days', 'base_price');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('packages', 'public');
            $data['image_path'] = $path;
        }

        $package->update($data);

        // Sync activities with pivot data (included_sessions)
        if ($request->activity_ids) {
            $syncData = collect($request->activity_ids)->mapWithKeys(function ($activityId) use ($request) {
                return [
                    $activityId => [
                        'included_sessions' => $request->sessions[$activityId] ?? 0
                    ]
                ];
            })->toArray();

            $package->activities()->sync($syncData);
        } else {
            // If no activities selected, detach all
            $package->activities()->detach();
        }

        return redirect()->route('admin.packages.index')->with('success', 'Package mis à jour avec succès.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package supprimé avec succès.');
    }
}
