<?php

namespace App\Http\Controllers;

use App\Models\RaceResult;
use App\Models\Race;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $names = Race::distinct()->orderBy('name')->pluck('name');
        $results = [];
        foreach ($names as $name) {
            $bestResult = RaceResult::whereHas('race', function ($query) use ($name) {
                $query->where('name', $name);
            })->orderBy('laptime')->first();
            $results[] = [
                'race' => $name,
                'race_id' => $bestResult->race->id,
                'name' => $bestResult->user->name,
                'laptime' => $bestResult->laptime
            ];
        }

        return view('home', compact('results'));
    }
}
