<?php

namespace App\Http\Controllers;

use App\Models\TrackRoute;
use Illuminate\Http\Request;

class TrackRouteCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $trackroute = TrackRoute::all();
        return view('trackroutes.index', compact('trackroute'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trackroutes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'string|max:16',
            'route_name' => 'string|max:255',
            'routepoints' => 'string',
        ]);

        $trackroute = new TrackRoute();
        $trackroute->code = $request->code;
        $trackroute->route_name = $request->route_name;
        $trackroute->routepoints = $request->routepoints;
        $trackroute->save();

        return redirect()->route('trackroute.index')->with('status', 'Track Route created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trackroute = TrackRoute::findOrFail($id);
        return view('trackroutes.show', compact('trackroute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
