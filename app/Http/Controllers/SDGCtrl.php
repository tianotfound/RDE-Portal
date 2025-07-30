<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Sdg;

class SDGCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $sdg = Sdg::all();
        return view('publicview.sdg', compact('sdg'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $sdg = Sdg::all();
        return view('sdg.create', compact('sdg'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'logo'    => 'nullable|file|mimes:jpg,jpeg,png,gif|max:10240',
            'banner'  => 'nullable|file|mimes:jpg,jpeg,png,gif|max:10240',
            'gif'     => 'nullable|file|mimes:gif|max:10240',
            'content' => 'nullable|string',
            'pdf'     => 'nullable|file|mimes:pdf|max:5120',
        ]);

        // Store files if present and update $validated array
        foreach (['logo', 'banner', 'gif', 'pdf'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('sdg'), $filename);
                $validated[$field] = $filename; // store only the filename
            }
        }

        // Save to the database, assuming an SDG model
        Sdg::create($validated);

        return redirect()->route('sustainable-development-goals.create')
            ->with('status', 'SDG created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sdg = Sdg::findOrFail($id);
        $sdgs = Sdg::all();
        return view('sdg.show', compact('sdg', 'sdgs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sdg = Sdg::findOrFail($id);
        return view('sdg.edit', compact('sdg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'logo'    => 'nullable|file|mimes:jpg,jpeg,png,gif|max:10240',
            'banner'  => 'nullable|file|mimes:jpg,jpeg,png,gif|max:10240',
            'gif'     => 'nullable|file|mimes:gif|max:10240',
            'content' => 'nullable|string',
            'pdf'     => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $sdg = Sdg::findOrFail($id);

        // Handle file uploads and update $validated array
        foreach (['logo', 'banner', 'gif', 'pdf'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('sdg'), $filename);
                $validated[$field] = $filename;
            } else {
                // If no new file uploaded, keep the old value
                unset($validated[$field]);
            }
        }

        $sdg->update($validated);

        return redirect()->route('sustainable-development-goals.create')
            ->with('status', 'SDG updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
