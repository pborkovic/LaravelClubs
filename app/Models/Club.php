<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    public function league(){
        return $this->belongsTo(League::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }

    protected $fillable = [
        'name', 'country', 'number_of_titles', 'league', 'founding_year',
        'stadium', 'coach', 'captain', 'current_value', 'colors',
        'description', 'avg_goals', 'is_champion', 'avg_attendance'
    ];
}
