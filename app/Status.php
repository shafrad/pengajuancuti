<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $fillable = ['cuti_id', 'status', 'alasan'];

    public function cuti()
    {
        return $this->belongsTo('App\Cuti');
    }
}
