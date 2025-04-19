<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            ['jenjang_id' => 1, 'nama' => 'Kelas 1'],
            ['jenjang_id' => 1, 'nama' => 'Kelas 2'],
            ['jenjang_id' => 1, 'nama' => 'Kelas 3'],
            ['jenjang_id' => 1, 'nama' => 'Kelas 4'],
            ['jenjang_id' => 1, 'nama' => 'Kelas 5'],
            ['jenjang_id' => 1, 'nama' => 'Kelas 6'],
            ['jenjang_id' => 2, 'nama' => 'Kelas 7'],
            ['jenjang_id' => 2, 'nama' => 'Kelas 8'],
            ['jenjang_id' => 2, 'nama' => 'Kelas 9'],
            ['jenjang_id' => 3, 'nama' => 'Kelas 10'],
            ['jenjang_id' => 3, 'nama' => 'Kelas 11'],
            ['jenjang_id' => 3, 'nama' => 'Kelas 12'],
        ]);
    }
}
