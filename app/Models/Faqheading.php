<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqheading extends Model
{
    use HasFactory;
    protected $table = 'faqheadings';
    protected $fillable = [
        'heading',
        'description',
        'image',
    ];
}
