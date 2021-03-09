<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'speciality',
        'morning',
        'afternoon',
        'evening',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
