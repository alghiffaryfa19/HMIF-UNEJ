<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Divisi extends Model
{
    use HasFactory;
    protected $table='divisis';
    protected $guarded = [];

    public function staff()
    {
        return $this->hasMany(\App\Models\Staff::class, 'divisi_id','id');
    }

    public function proker()
    {
        return $this->hasMany(\App\Models\Proker::class, 'divisi_id','id');
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
