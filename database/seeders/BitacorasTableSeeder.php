<?php

namespace Database\Seeders;
use App\Models\Bitacora;
use Illuminate\Database\Seeder;

class BitacorasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('bitacoras')->delete();
    }
}
