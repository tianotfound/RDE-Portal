<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{

    // Display all pictures
    public function index()
    {
        $pictures = Picture::all();
        return view('pictures.index', compact('pictures'));
    }

    // Show the form to create a new picture
    public function create()
    {
        return view('pictures.create');
    }

    // Store a new picture
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $file = $request->file('picture');
        $path = $file->store('pictures', 'public');

        $picture = Picture::create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
        ]);

        return redirect()->route('pictures.index')->with('success', 'Picture uploaded successfully.');
    }

    // Show the form to edit a picture
    public function edit($id)
    {
        $picture = Picture::findOrFail($id);
        return view('pictures.edit', compact('picture'));
    }

    public function show($id)
    {
        $picture = Picture::findOrFail($id);
        return view('pictures.show', compact('picture'));
    }

    // Update a picture
    public function update(Request $request, $id)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $picture = Picture::findOrFail($id);
        
        // Delete the old picture if a new one is uploaded
        if ($request->hasFile('picture')) {
            Storage::disk('public')->delete($picture->path);
            $file = $request->file('picture');
            $path = $file->store('pictures', 'public');
            $picture->update([
                'name' => $file->getClientOriginalName(),
                'path' => $path,
            ]);
        }

        return redirect()->route('pictures.index')->with('success', 'Picture updated successfully.');
    }

    // Delete a picture
    public function destroy($id)
    {
        $picture = Picture::findOrFail($id);
        Storage::disk('public')->delete($picture->path);
        $picture->delete();

        return redirect()->route('pictures.index')->with('success', 'Picture deleted successfully.');
    }
}
