<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialsOffersSeeder extends Seeder
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
            DB::table('specials_offers')->insert([
                'name' => $generator->getName() . ' - Promotion',
                'discount_percentage' => rand(1, 100)
            ]);
        }
    }
}
