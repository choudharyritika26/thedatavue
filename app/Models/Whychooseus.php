<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whychooseus extends Model
{
    use HasFactory;
    protected $table = 'whychooseuses';
    protected $fillable = [
        'heading',
        'description',
        'image',
    ];
}
