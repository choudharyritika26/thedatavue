<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $table = 'technologies';
    protected $fillable = [
        'description',
    ];

    public function portfolioName()   
    {
        // Assuming the foreign key is 'product_id' in the SingleProduct table
        return $this->belongsTo(Portfolio::class, 'portfolio');
    }
}
