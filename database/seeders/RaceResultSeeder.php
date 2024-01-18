<?php

namespace Database\Seeders;

use App\Models\RaceResult;
use App\Models\User;
use App\Models\Race;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RaceResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $races = Race::all();

        foreach ($races as $race)
        {
            foreach ($users as $user)
            {
                RaceResult::factory(random_int(1,8))->create([
                    'race_id' => $race->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
