<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Percentage extends Model
{
    use HasFactory;
    protected $table = 'percentages';
    protected $fillable = [
        'language',
        'percent',
        'is_active',
        'sort_col',
    ];
}
