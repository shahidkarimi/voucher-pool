<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipients')->insert([
            'name' => 'Anjali',
            'mail' => 'anjali@yahoo.com',
        ]);
        DB::table('recipients')->insert([
            'name' => 'Kasal',
            'mail' => 'kasal@kasal.com',
        ]);
    }
}
