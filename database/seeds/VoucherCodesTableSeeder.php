<?php

use Illuminate\Database\Seeder;

class VoucherCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offer = \App\SpecialOffer::where('name','Black Friday Offer')->first();
        $reciepient = \App\Recipient::where('mail', 'anjali@yahoo.com')->first();

        $voucher = new \App\VoucherCode;
        $voucher->code = 'XkKp8Jki';
        $voucher->user_id = $reciepient->id;
        $voucher->special_offer_id = $offer->id;
        $voucher->save();

    }
}
