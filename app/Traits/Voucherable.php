<?php

namespace App\Traits;

use App\Recipient;
use App\VoucherCode;

/**
 * Actual implementation of quering the MySQL database to fetch and redeem voucher codes
 * Trait Voucherable
 * @package App\Traits
 */
trait Voucherable
{
    /**
     * @param $email
     * @return array
     */
    public function getAllVoucherCodes($email)
    {


        $ret = [];
        $user = Recipient::where('mail', $email)->first();
        $vouchers = VoucherCode::where('user_id', $user->id)
            ->whereNull('date_redeemed')->get();
        foreach ($vouchers as $v) {

            $ret[] = ['code' => $v->code, 'offer' => $v->offer->name];

        }

        return $ret;
    }

    /**
     * @param $email
     * @param $code
     * @return array
     */
    public function redeemVoucherCode($email, $code)
    {

        $recipient = \App\Recipient::where('mail', $email)->first();

        $voucher = VoucherCode::where('code', $code)
            ->where('user_id', $recipient->id)
            ->whereNull('date_redeemed')->first();

        if ($voucher) {
            $voucher->date_redeemed = \Carbon\Carbon::now();

            $voucher->save();

            return ['percentage_discount' => $voucher->offer->discount];
        }

        return ['status' => 'error', 'message' => 'Invalid Voucher code'];
    }
}