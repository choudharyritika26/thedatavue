<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'heading',
        'description',
        'image',
    ];

    public function ServicescatagriesName()   
    {
        // Assuming the foreign key is 'product_id' in the SingleProduct table
        return $this->belongsTo(Servicescatagries::class, 'category');   
    }
}
