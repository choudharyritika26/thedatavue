<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicesdetails extends Model
{
    use HasFactory;
    protected $table = 'servicesdetails';
    // protected $fillable = [
    //     'heading',
    //     'description',
    // ];

    public function ServicescatagriesName()   
    {
        // Assuming the foreign key is 'product_id' in the SingleProduct table
        return $this->belongsTo(Services::class, 'service');   
    }
}
