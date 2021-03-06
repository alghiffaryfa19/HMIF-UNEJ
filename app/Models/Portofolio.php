<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portofolio extends Model
{
    use HasFactory;

    protected $table='portofolios';
    protected $guarded = [];

    public function foto()
    {
        return $this->hasMany(\App\Models\GalleryPortofolio::class, 'portofolio_id','id');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
