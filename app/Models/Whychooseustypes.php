<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whychooseustypes extends Model
{
    use HasFactory;
    
    protected $table = 'whychooseustypes';
    protected $fillable = [
        'heading',
        'description',
    ];
}
