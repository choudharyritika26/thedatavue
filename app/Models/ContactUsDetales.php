<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsDetales extends Model
{
    use HasFactory;
    protected $table = 'contact_us_detales';
    protected $fillable = [
        'address',
        'email_id',
        'phone_no',
    ];
}
