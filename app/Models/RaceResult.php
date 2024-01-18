<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'race_id',
        'laptime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    //convert to miliseconds
    public function convertLaptimeToMiliseconds()
    {
        //split laptime into minutes, seconds, miliseconds
        list($minutes, $seconds, $miliseconds) = explode(':', $this->laptime);

        //calculate total miliseconds
        return ($minutes * 60 * 1000) + ($seconds * 1000) + (int)$miliseconds;
    }

    public function calculateKMPH($decimals = 2) {

        if(!$this->race->length_circuit) {
            return 'Unknown track distance';
        }

        $partOfHour = $this->convertLaptimeToMiliseconds() / (60 * 60 * 1000);
        $distance = $this->race->length_circuit;
        $speed = $distance/$partOfHour;

        return number_format($speed, $decimals);


    }
}
