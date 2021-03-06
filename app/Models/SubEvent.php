<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubEvent extends Model
{
    use HasFactory;

    protected $table='sub_events';
    protected $guarded = [];

    public function proker()
    {
        return $this->belongsTo(\App\Models\Proker::class, 'proker_id','id');
    }

    public function participant()
    {
        return $this->hasMany(\App\Models\Participant::class, 'sub_event_id','id');
    }

}
