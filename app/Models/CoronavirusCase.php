<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoronavirusCase extends Model
{
    use HasFactory;
    protected $fillable = [
        'country',
        'total_cases',
        'new_cases',
        'total_deaths',
        'new_deaths',
        'total_recovered',
        'active_cases',
        'critical',
        'tot_cases',
        'deaths',
        'total_tests',
        'tests',
        'population',
        '1_case',
        '1_death',
        '1_test'
    ];
}
