<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryProduct extends Model
{
    use HasFactory;
    protected $table='gallery_products';
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id','id');
    }
}
