<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Models\RaceResult;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     *  $this->middleware('auth'); => gebruiker moet ingelogd zijn!
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->profile) {
            return redirect()->route('profiles.edit', auth()->user()->profile->id);
        }
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {

        $request->validate([
            'user_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required'
        ]);

        Profile::create($request->all());

        return redirect()->route('profiles.index')->with('succes', 'Profile created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        $minLaptimes = RaceResult::select('race_id', DB::raw('MIN(laptime) as min_laptime'))
            ->groupBy('race_id');

        $username = $profile->user->name;
        $raceWins = RaceResult::joinSub($minLaptimes, 'min_laptimes', function ($join) {
            $join->on('race_results.race_id', '=', 'min_laptimes.race_id');
            $join->on('race_results.laptime', '=', 'min_laptimes.min_laptime');
        })
            ->join('races', 'race_results.race_id', '=', 'races.id')
            ->join('users', 'race_results.user_id', '=', 'users.id')
            ->select('races.id as race_id', 'races.name as race_name', 'races.date as race_date', 'race_results.laptime as laptime')
            ->where('users.name', $username)
            ->distinct()
            ->orderBy('races.date', 'desc') // Adjust 'desc' or 'asc' based on your sorting preference
            ->get()->slice(0,3);

//        dd($racesWon);

        $user_id = $profile->user->id;
        $raceResults = RaceResult::join('races', 'race_results.race_id', '=', 'races.id')
            ->join('users', 'race_results.user_id', '=', 'users.id')
            ->where('race_results.user_id', $user_id)
            ->orderBy('races.date')
            ->select('race_results.laptime', 'users.name as user_name', 'races.name as race_name', 'races.date as race_date') // Select the columns you need
            ->get();
        return view('profiles.show', compact('profile', 'raceResults', 'raceWins'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {

        if ($profile->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //$this->authorize('update', $profile);
        if ($profile->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'mobile' => 'required|string|max:15'
        ]);

        $profile->update($request->all());

        return redirect()->route('profiles.index')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->route('profiles.index')
            ->with('success', 'Profile deleted successfully.');
    }
}



