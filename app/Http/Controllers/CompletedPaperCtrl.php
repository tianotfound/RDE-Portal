<?php

namespace App\Http\Controllers;

use App\Models\CompletedPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompletedPaperCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all completed papers with related user info
        $completedPapers = CompletedPaper::with('user')->get();

        // Pass everything to the view
        return view('profiling.completed.index', [
            'completedPapers' => $completedPapers,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiling.completed.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validate the input
    $validatedData = $request->validate([
        'title' => 'required|string|max:500',
        'author' => 'required|string|max:255',
        'priorityarea' => 'required|string|max:255',
        'sdg' => 'required|array',
        'researchapproach' => 'required|string|max:255',
        'method' => 'required|string|max:255',
        'file' => 'required|file|mimes:pdf,doc,docx|max:102400', // max 100MB
        'doi' => 'nullable|string|max:255',
        'users_id' => 'required|exists:users,id',
    ]);
    // Handle file upload
    if ($request->hasFile('file')) {
        $file = $request->file('file')->storeAs('completed_papers', $request->file('file')->getClientOriginalName(), 'public');
        $file = public_path('storage/' . $file);
    } else {
        $file = null;
    }
    // Store data in database
    $completed = new CompletedPaper();
    $completed->title = $validatedData['title'];
    $completed->author = $validatedData['author'];
    $completed->priorityarea = $validatedData['priorityarea'];
    $completed->sdg = json_encode($validatedData['sdg']); // storing as JSON
    $completed->researchapproach = $validatedData['researchapproach'];
    $completed->method = $validatedData['method'];
    $completed->file = $file;
    $completed->doi = $validatedData['doi'];
    $completed->users_id = $validatedData['users_id'];
    $completed->save();

    return redirect()->route('completed.index')->with('status', 'Completed research added successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the completed paper by ID
        $completedPaper = CompletedPaper::with('user')->findOrFail($id);

        // Retrieve all files in the completed_papers directory
        $files = Storage::files('public/completed_papers');
        $files = array_map(function ($file) {
            return str_replace('public/', 'storage/', $file);
        }, $files);

        // Pass the completed paper and file URLs to the view
        return view('profiling.completed.show', [
            'completedPaper' => $completedPaper,
            'files' => $files,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the completed paper by ID
        $completedPaper = CompletedPaper::findOrFail($id);

        $sdgOptions = [
            'SDG1' => 'SDG 1 - No Poverty',
            'SDG2' => 'SDG 2 - Zero Hunger',
            'SDG3' => 'SDG 3 - Good Health and Well-being',
            'SDG4' => 'SDG 4 - Quality Education',
            'SDG5' => 'SDG 5 - Gender Equality',
            'SDG6' => 'SDG 6 - Clean Water and Sanitation',
            'SDG7' => 'SDG 7 - Affordable and Clean Energy',
            'SDG8' => 'SDG 8 - Decent Work and Economic Growth',
            'SDG9' => 'SDG 9 - Industry, Innovation and Infrastructure',
            'SDG10' => 'SDG 10 - Reduced Inequality',
            'SDG11' => 'SDG 11 - Sustainable Cities and Communities',
            'SDG12' => 'SDG 12 - Responsible Consumption and Production',
            'SDG13' => 'SDG 13 - Climate Action',
            'SDG14' => 'SDG 14 - Life Below Water',
            'SDG15' => 'SDG 15 - Life on Land',
            'SDG16' => 'SDG 16 - Peace, Justice and Strong Institutions',
            'SDG17' => 'SDG 17 - Partnerships for the Goals',
        ];
        return view('profiling.completed.edit', [
            'completedPaper' => $completedPaper,
            'sdgOptions' => $sdgOptions,
        ])->with('status', 'Edit form loaded successfully!');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the existing completed paper
        $completed = CompletedPaper::findOrFail($id);

        // Validate the input
        $validatedData = $request->validate([
            'title' => 'required|string|max:500',
            'author' => 'required|string|max:255',
            'priorityarea' => 'required|string|max:255',
            'sdg' => 'required|array',
            'researchapproach' => 'required|string|max:255',
            'method' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // optional in update
            'doi' => 'nullable|string|max:255',
        ]);
        // Handle optional file update
        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if ($completed->file) {
            Storage::disk('public')->delete($completed->file);
            }
            // Store the new file in the completed_papers directory
            $file = $request->file('file')->store('completed_papers', 'public');
            $completed->file = $file;
        }
        // Update model data
        $completed->title = $validatedData['title'];
        $completed->author = $validatedData['author'];
        $completed->priorityarea = $validatedData['priorityarea'];
        $completed->sdg = json_encode($validatedData['sdg']); // storing as JSON
        $completed->researchapproach = $validatedData['researchapproach'];
        $completed->method = $validatedData['method'];
        $completed->doi = $validatedData['doi'];
        
        $completed->save();

        return redirect()->route('completed.index')->with('status', 'Completed research updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the completed paper by ID
        $completedPaper = CompletedPaper::findOrFail($id);

        // Delete the file from storage if it exists
        if ($completedPaper->file) {
            Storage::disk('public')->delete($completedPaper->file);
        }

        // Delete the completed paper from the database
        $completedPaper->delete();

        return redirect()->route('completed.index')->with('success', 'Completed research deleted successfully!');
    }
}
