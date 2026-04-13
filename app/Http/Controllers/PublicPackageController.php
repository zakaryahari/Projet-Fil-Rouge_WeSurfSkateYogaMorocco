<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PublicPackageController extends Controller
{
    /**
     * Display the specified package details.
     */
    public function show($id)
    {
        $package = Package::findOrFail($id);

        return view('packages.show', [
            'package' => $package,
        ]);
    }
}
