<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Proker extends Model implements \Acaronlex\LaravelCalendar\Event
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

    public function timeline()
    {
        return $this->hasMany(\App\Models\Timeline::class, 'proker_id','id');
    }

    protected $dates = ['start', 'end'];

    /**
     * Get the event's id number
     *
     * @return int
     */
    public function getId() {
		return $this->id;
	}

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    public function getColor()
    {
        return $this->backgroundColor;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getEventOptions()
    {
        return [
            'color' => $this->background_color,
			//etc
        ];
    }
}
