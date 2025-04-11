<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainingtype extends Model
{
    use HasFactory;
    protected $table = 'trainingtypes';
    protected $fillable = [
        'heading',
        'description',
        'image',
        'duration',
    ];
}
