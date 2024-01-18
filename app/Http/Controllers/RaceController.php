<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Race;
use App\Http\Requests\StoreRaceRequest;
use App\Http\Requests\UpdateRaceRequest;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $races = Race::all();
        return view('races.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!auth()->check() || !auth()->user()->admin) {
            return redirect()->route('home');
        }
        return view('races.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRaceRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'length_circuit' => 'required',
            'date' => 'required|date'
        ]);

        Race::create($request->all());

        return redirect()->route('races.index')->with('succes', 'Race created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Race $race)
    {
        $miliseconds = ceil(collect($race->getLaptimes())->avg());

        $minutes = floor($miliseconds / 60000);
        $miliseconds %= 60000;

        $seconds = floor($miliseconds / 1000);
        $miliseconds %= 1000;

        $avgLaptime =  sprintf("%02d:%02d:%03d", $minutes, $seconds, $miliseconds);
        return view('races.show', compact('race', 'avgLaptime'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Race $race)
    {
        return view('races.edit', compact('race'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRaceRequest $request, Race $race)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'length_circuit' => 'required',
            'date' => 'required|date'
        ]);

        $race->update($request->all());

        return redirect()->route('races.index')
            ->with('success', 'Race updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Race $race)
    {
        $race->delete();

        return redirect()->route('races.index')
            ->with('success', 'Race deleted successfully.');
    }
}
