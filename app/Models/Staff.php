<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table='staff';
    protected $guarded = [];

    public function divisi()
    {
        return $this->belongsTo(\App\Models\Divisi::class, 'divisi_id','id');
    }
}
