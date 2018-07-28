<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VouchersCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            $generator = \Nubs\RandomNameGenerator\All::create();
            DB::table('vouchers_codes')->insert([
                'offer_id' => rand(1, 100),
                'recipient_id' => rand(1, 100),
                'code' => str_random(10)
            ]);
        }
    }
}
