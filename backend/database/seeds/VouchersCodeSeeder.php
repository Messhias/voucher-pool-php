<?php

use Illuminate\Database\Seeder;

class VouchersCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\VoucherCode::class, 50)->create()->each(function ($u) {
            $u->save()->make();
        });
    }
}
