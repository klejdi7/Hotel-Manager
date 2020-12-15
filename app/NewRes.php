<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model 

{
    protected $fillble = [
        'fname' , 'lname', 'nid', 'checkin', 'checkout', 'adult', 'child', 'room_nr', 'room_plan'
    ];


    protected $hidden = [
        'res_by',
    ];
}