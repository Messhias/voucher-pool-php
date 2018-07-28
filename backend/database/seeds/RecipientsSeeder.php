<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipientsSeeder extends Seeder
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
            DB::table('recipients')->insert([
                'name' => $generator->getName(),
                'email' => str_random(10).'@gmail.com',
            ]);
        }
    }
}
