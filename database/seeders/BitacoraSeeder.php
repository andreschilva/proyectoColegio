<?php

use App\Models\Bitacora;
use Illuminate\Database\Seeder;

class BitacoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('bitacora')->delete();
    }
}
