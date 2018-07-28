<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
    public $timestamps = false;
    public $fillable = ['name','discount','expiry_date'];
}
