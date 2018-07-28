<?php

use Illuminate\Database\Seeder;

class RecipientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Recipient::class, 50)->create()->each(function ($u) {
            $u->save()->make();
        });
    }
}
