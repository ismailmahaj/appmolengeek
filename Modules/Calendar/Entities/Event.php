<?php

namespace Modules\Calendar\Entities;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['categorie', 'description', 'title', 'image', 'start_date','end_date'];
    public function user()
    {
// liaison entre Event et user 
        return $this->belongsTo('App\User','user_id', 'id');

    }
    public function reservation()
    {
        return $this->hasMany('Modules\Calendar\Entities\Reservation','reservation_id');
    }
}
