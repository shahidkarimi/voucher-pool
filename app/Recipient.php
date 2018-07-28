<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    public $timestamps = false;

    public $fillable = ['name', 'email'];

    public function vouchers(){
        return $this->hasMany('App\VoucherCode', 'user_id', 'id');
    }
}
