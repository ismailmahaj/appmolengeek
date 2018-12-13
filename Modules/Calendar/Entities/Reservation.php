<?php

namespace Modules\Calendar\Entities;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [];

    public function event(){
        return $this->hasMany("Modules\Calendar\Entities\Event","event_id");
    }

    public function room(){
        return $this->hasMany("Modules\Calendar\Entities\Room","room_id");
    }
}
