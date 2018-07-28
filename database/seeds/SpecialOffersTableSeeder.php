<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialOffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('special_offers')->insert([
            'name' => 'Black Friday Offer',
            'discount' => 40,
        ]);
    }
}
