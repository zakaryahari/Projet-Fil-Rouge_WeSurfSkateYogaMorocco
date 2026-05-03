<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'event_date'       => 'required|date_format:Y-m-d\TH:i',
            'max_participants' => 'required|integer|min:1|max:999',
            'price'            => 'required|numeric|min:0',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imagePath = Storage::disk('public')->putFile('events', $file);
        }

        Event::create([
            'title'            => $request->title,
            'description'      => $request->description,
            'event_date'       => $request->event_date,
            'max_participants' => $request->max_participants,
            'price'            => $request->price,
            'image_path'       => $imagePath,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Événement créé avec succès.');
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'event_date'       => 'required|date_format:Y-m-d\TH:i',
            'max_participants' => 'required|integer|min:1|max:999',
            'price'            => 'required|numeric|min:0',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $event->image_path;

        
        if ($request->hasFile('image')) {
           
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $file = $request->file('image');
            $imagePath = Storage::disk('public')->putFile('events', $file);
        }

        $event->update([
            'title'            => $request->title,
            'description'      => $request->description,
            'event_date'       => $request->event_date,
            'max_participants' => $request->max_participants,
            'price'            => $request->price,
            'image_path'       => $imagePath,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Événement mis à jour avec succès.');
    }

    public function destroy(Event $event)
    {
       
        if ($event->image_path) {
            Storage::disk('public')->delete($event->image_path);
        }

        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Événement supprimé avec succès.');
    }
}
