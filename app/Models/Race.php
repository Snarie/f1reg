<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'length_circuit',
        'date'
    ];
    public function raceResults()
    {
        return $this->hasMany(RaceResult::class);
    }

    public function getLaptimes()
    {
        $laptimes = $this->raceResults->map(function ($raceResult) {
            return $raceResult->convertLaptimeToMiliseconds();
        })->all();

        return $laptimes;
    }
}
