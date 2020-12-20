<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tour extends Model
{
    use Notifiable;

    protected $table = 'tour';

    protected $fillable = [
        'tour_name', 'vehicle', 'departure','day_night', 'price', 'note',
    ];
}
