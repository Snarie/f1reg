<?php

namespace App\Console\Commands;

use App\Models\Race;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchRaces extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-races';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('http://ergast.com/api/f1/current.json');
        $races = $response->json()['MRData']['RaceTable']['Races'];

        foreach ($races as $raceData) {
            Race::create([
                'name' => $raceData['raceName'],
                'location' => $raceData['Circuit']['Location']['locality'] ?? 'Unknown',
                'length_circuit' => 0,//not specified (placeholder)
                'date' => $raceData['date'],
            ]);
        }
    }
}
