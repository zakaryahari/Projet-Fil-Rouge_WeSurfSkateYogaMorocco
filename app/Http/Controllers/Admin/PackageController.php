<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'base_price'  => 'required|numeric|min:0',
        ]);

        Package::create($request->only('name', 'description', 'base_price'));

        return redirect()->route('admin.packages.index')->with('success', 'Package créé avec succès.');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'base_price'  => 'required|numeric|min:0',
        ]);

        $package->update($request->only('name', 'description', 'base_price'));

        return redirect()->route('admin.packages.index')->with('success', 'Package mis à jour avec succès.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package supprimé avec succès.');
    }
}
