<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Careercontact extends Model
{
    use HasFactory;
    protected $table = 'careercontacts';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'job',
        'image',
    ];
}
