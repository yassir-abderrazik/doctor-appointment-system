<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'title',
        'start',
        'end',
        'gender',
        'raisonsSymptômes',
        'state',
        'temperature',
        'tension',
        'poids',
        'detectionAllergies',
        'medicaments',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'start',
        'end'
        ];
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    
}
