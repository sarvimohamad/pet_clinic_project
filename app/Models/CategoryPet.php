<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
