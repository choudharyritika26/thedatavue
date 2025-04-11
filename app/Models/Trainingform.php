<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainingform extends Model
{
    use HasFactory;
    protected $table = 'trainingforms';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'duration',
        'qualification',
    ];
}
