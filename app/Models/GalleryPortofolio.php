<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPortofolio extends Model
{
    use HasFactory;
    protected $table='gallery_portofolios';
    protected $guarded = [];

    public function portofolio()
    {
        return $this->belongsTo(\App\Models\Portofolio::class, 'portofolio_id','id');
    }
}
