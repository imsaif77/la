<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepCount extends Model
{
    use HasFactory;

    protected $table = 'steps';
    protected $fillable = [
        'user_id', 
        'steps'
    ];    
}
