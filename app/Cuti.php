<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    //
    protected $fillable = ['name', 'tgl_awal_cuti', 'durasi_cuti', 'keperluan_cuti', 'alamat_cuti'];

    public function status()
    {
        return $this->hasOne('App\Status');
    }
}
