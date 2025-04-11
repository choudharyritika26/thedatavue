<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $table = 'portfolios';
    protected $fillable = [
        'heading',
        'description',
        'image',
        'startdate',
        'project_url',
        'slider_image',
    ];

    public function catagoryName()   
    {
        // Assuming the foreign key is 'product_id' in the SingleProduct table
        return $this->belongsTo(Catagory::class, 'catagory');
    }
}
