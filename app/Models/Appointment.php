<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id','vet_id','appointment_date','morning','afternoon','evening'
    ];

    public function vet()
    {
        return $this->belongsTo(Vet::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
