<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicescatagries extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'servicescatagries';
    protected $fillable = [
        'category',
    ];
}
