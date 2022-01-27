<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        
        'isAvailableOnMonday',
        'mondayStartingTime',
        'mondayClosingTime',

        'isAvailableOnTuesday',
        'tuesdayStartingTime',
        'tuesdayClosingTime',

        'isAvailableOnWednesday',
        'wednesdayStartingTime',
        'wednesdayClosingTime',

        'isAvailableOnThursday',
        'thursdayStartingTime',
        'thursdayClosingTime',

        'isAvailableOnFriday',
        'fridayStartingTime',
        'fridayClosingTime',

        'isAvailableOnSaturday',
        'saturdayStartingTime',
        'saturdayClosingTime',

        'isAvailableOnSunday',
        'sundayStartingTime',
        'sundayClosingTime',

        'timeConsultation',

        'substitute',
        'nameSubstitute',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        // 'sundayStartingTime',
        // 'sundayClosingTime',
        // 'saturdayStartingTime',
        // 'saturdayClosingTime',
        // 'fridayStartingTime',
        // 'fridayClosingTime',
        // 'thursdayStartingTime',
        // 'thursdayClosingTime',
        // 'wednesdayStartingTime',
        // 'wednesdayClosingTime',
        // 'mondayStartingTime',
        // 'mondayClosingTime',
        // 'tuesdayStartingTime',
        // 'tuesdayClosingTime',
        ];
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    
}
