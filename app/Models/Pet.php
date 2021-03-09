<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Pet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_pets_id',
        'name',
        'age',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoryPet::class,'category_pets_id');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
