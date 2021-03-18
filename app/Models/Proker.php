<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Proker extends Model
{
    use HasFactory;
    protected $table='prokers';
    protected $guarded = [];

    public function divisi()
    {
        return $this->belongsTo(\App\Models\Divisi::class, 'divisi_id','id');
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
