<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('bancos')->insert([
            [
                'codigo' => '1059',
                'nombre' => 'BANCAMIA S.A',
            ],
            [
                'codigo' => '1040',
                'nombre' => 'BANCO AGRARIO',
            ],
            [
                'codigo' => '1052',
                'nombre' => 'BANCO AV VILLAS',
            ],

        ]);
    }
}
