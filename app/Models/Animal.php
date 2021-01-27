<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_number',
        'sex',
        'date_of_birth',
        'mother_number',
        'father_number',
        'color',
        'breed',
        'calving_technician',
        'calving_weight',
    ];

    public function barn()
    {
        return $this->belongsToMany(Barn::class);
    }

    public function scopeFilter($query, $filters)
    {   
        if ($year = $filters['year'] ?? false) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function search($search)
    {
        
        return empty($search) ? static::query() 
            : static::query()->whereDate('date_of_birth', 'like', '%'.$search.'%')
            ->orWhere('animal_number', 'like', '%'.$search.'%');
    }
}
