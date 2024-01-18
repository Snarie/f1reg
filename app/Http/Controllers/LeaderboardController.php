<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\RaceResult;

class LeaderboardController extends Controller
{
    public function upcomingRaceLeaderBoard()
    {
        $upcomingRace = Race::where('date', '>', now())->orderBy('date', 'asc')->first();

        if(!$upcomingRace) {
            return view('no_race');
        }

        $leaderboard = RaceResult::where('race_id', $upcomingRace->id)
                            ->orderBy('laptime', 'asc')//snelste tijd
                            ->with('user')//gebruiksgegevens per resultaat
                            ->get();
        return view('leaderboard.upcoming', ['leaderboard' => $leaderboard, 'race' => $upcomingRace]);
    }
}
