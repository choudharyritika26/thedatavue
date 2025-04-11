<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutdetail extends Model
{
    use HasFactory;
    protected $table = 'aboutdetails';
    protected $fillable = [
        'heading',
        'description',
        'is_active',
    ];
}
