<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    protected $table='timelines';
    protected $guarded = [];

    public function proker()
    {
        return $this->belongsTo(\App\Models\Proker::class, 'proker_id','id');
    }
}
