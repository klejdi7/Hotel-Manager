<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected static function boot()
    {
        parent::boot();
    
        static::addGlobalScope('reservations', function (Builder $builder) {
            $builder->where('fname_res', '=', $res_name);
        });
    }    
}
