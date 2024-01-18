<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRaceResultRequest;
use App\Http\Requests\UpdateRaceResultRequest;
use App\Models\User;
use App\Models\Race;
use Illuminate\Http\Request;
use App\Models\RaceResult;

class RaceResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->validate([
            'laptimeMin' => 'nullable|regex:/^[0-5]?[0-9]:[0-5][0-9]:[0-9]{3}$/',
            'laptimeMax' => 'nullable|regex:/^[0-5]?[0-9]:[0-5][0-9]:[0-9]{3}$/'
        ]);
        $users = User::all();
        $races = Race::all();

        //initial
        $query = RaceResult::query();

        if($request->has('sortBy')) {
            $sortBy = $request->input('sortBy');
            if($sortBy == 'user_name') {
                $query->join('users', 'race_results.user_id', '=', 'users.id')
                    ->orderBy('users.name', 'asc')
                    ->select('race_results.*');
            }
            else if($sortBy == 'race_name') {
                $query->join('races', 'race_results.race_id', '=', 'races.id')
                    ->orderBy('races.name', 'asc')
                    ->select('race_results.*');
            }
            else if($sortBy == 'laptime') {
                $query->orderBy('laptime');
            }
        }

        if ($request->has('laptimeMin')) {
            $laptimeMin = $request->input('laptimeMin');
            if($laptimeMin) {
                $query->where('laptime', '>=', $laptimeMin);
            }
        }

        if ($request->has('laptimeMax')) {
            $laptimeMax = $request->input('laptimeMax');
            if($laptimeMax) {
                $query->where('laptime', '<=', $laptimeMax);
            }
        }

        $raceResults = $query->get();

        return view('race-results.index', compact('raceResults', 'users', 'races'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!auth()->user()->admin) {
            return redirect()->route('home');
        }
        $users = User::all();
        $races = Race::all();
        return view('race-results.create', compact('users', 'races'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRaceResultRequest $request)
    {
        $raceResult = new RaceResult($request->validated());
        $raceResult->save();

        return redirect()->route('race-results.index');
//        return redirect()->route('race-results.index')
//            ->with('succes', 'Race result created');
    }

    /**
     * Display the specified resource.
     */
    public function show(RaceResult $raceResult)
    {
        return view('race-results.show', compact('raceResult'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RaceResult $raceResult)
    {
        $users = User::all();
        $races = Race::all();
        return view('race-results.edit', compact('raceResult', 'users', 'races'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRaceResultRequest $request, RaceResult $raceResult)
    {
        $raceResult->fill($request->validated());
        $raceResult->save();

        return redirect()->route('race-results.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RaceResult $raceResult)
    {
        $raceResult->delete();

        return redirect()->route('race-results.index')
            ->with('success', 'Race result deleted successfully.');
    }
}
