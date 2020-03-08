<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallLog extends Model
{


    public function user_inbound(){

        return $this->belongsTo(Contact::class,'id', 'contact_to_id');
    }

    public function user_outbound(){
        return $this->belongsTo(Contact::class,'id', 'contact_from_id');
    }
}
