<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;

class VoucherCode extends Model
{
    public $timestamps = false;

    public function recipient()
    {
        return $this->belongsTo('App\Recipient','user_id','id');
    }

    public function offer()
    {
        return $this->hasOne('App\SpecialOffer','id','special_offer_id');
    }

    /**
     * Generate random code
     * @return string
     */
    public static function getRandom(){

        $code = Utilities::randomKey();
        while(VoucherCode::where('code',$code)->exists()){
            $code = Utilities::randomKey();
        }
        return $code;
    }

    public static function genNewCode(Recipient $recipient,SpecialOffer $special_offer)
    {

        $code = new VoucherCode;
        $code->user_id = $recipient->id;
        $code->code = self::getRandom();
        $code->special_offer_id = $special_offer->id;

        try{
            return $code->save();
        }catch (Exception $x){
            return throwException($x);
        }
    }
}
