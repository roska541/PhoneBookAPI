<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'name', 'phone_number', 'first_name', 'last_name', 'address', 'company',
    ];

    public function outbound(){
        return $this->hasMany(CallLog::class, 'contact_from_id', 'id')
               ->where('outbound','=',1);
    }

    public function inbound(){
        return $this->hasMany(CallLog::class, 'contact_to_id', 'id')
               ->where('inbound','=',1);
    }
}
