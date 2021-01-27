<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barn extends Model
{
    use HasFactory;

    protected $fillable = [
        'barn_name'
    ];

    public function animals()
    {
        return $this->belongsToMany(Animal::class)->orderBy('animal_number');
    }
}
