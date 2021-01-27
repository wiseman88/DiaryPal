<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insemination extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_of_insemination',
        'animal_id',
        'animal_number',
        'inseminated_animal_number',
        'insemination_technician',
        'insemination_dose',
        'insemination_type',
        'insemination_encounter_by',
        'insemination_control',
    ];

    public static function search($search)
    {
        
        return empty($search) ? static::query() 
            : static::query()->whereDate('date_of_insemination', 'like', '%'.$search.'%')
            ->orWhere('animal_number', 'like', '%'.$search.'%')
            ->orWhere('insemination_technician', 'like', '%'.$search.'%');
    }
}
