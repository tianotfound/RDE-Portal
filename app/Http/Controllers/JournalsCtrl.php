<?php

namespace App\Http\Controllers;

use App\Models\Journals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JournalsCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $journals = Journals::all();
        return view('publicview.journals', compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $journals = Journals::all();
        return view('journals.create', compact('journals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'description'   => 'nullable|string|max:500',
            'banner'    => 'nullable|file|mimes:jpg,jpeg,png,gif|max:51200',
            'file'    => 'nullable|file|mimes:pdf|max:51200',
        ]);

        // Store files if present and update $validated array
        foreach (['file', 'banner'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('journals'), $filename);
                $validated[$field] = $filename; // store only the filename
            }
        }

        // Save to the database, assuming an SDG model
        Journals::create($validated);

        return redirect()->route('campus-journals.create')
            ->with('status', 'Campus Journal created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $journals = Journals::findOrFail($id);
        return view('journals.edit', compact('journals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'description'   => 'nullable|string|max:500',
            'banner'    => 'nullable|file|mimes:jpg,jpeg,png,gif|max:51200',
            'file'    => 'nullable|file|mimes:pdf|max:51200',
        ]);

        $journal = Journals::findOrFail($id);

        // Handle file uploads and update $validated array
        foreach (['file', 'banner'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('journals'), $filename);
                $validated[$field] = $filename;
            }
        }

        $journal->update($validated);

        return redirect()->route('campus-journals.create')
            ->with('status', 'Campus Journal updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
