<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfoliodetales extends Model
{
    use HasFactory;
    protected $table = 'portfoliodetales';
    protected $fillable = [
        'image',
        'title',
        'platform',
        'startdate',
        'enddate',
        'description',
    ];

    public function portfolioName()   
    {
        // Assuming the foreign key is 'product_id' in the SingleProduct table
        return $this->belongsTo(Portfolio::class, 'portfolio');
    }
}
