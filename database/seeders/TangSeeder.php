<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tang')->insert([
            ['ten_tang' => '1', 'id_toa_nha' => 1, 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_tang' => '1', 'id_toa_nha' => 2, 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_tang' => '1', 'id_toa_nha' => 3, 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_tang' => '2', 'id_toa_nha' => 3, 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_tang' => '3', 'id_toa_nha' => 3, 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_tang' => '8', 'id_toa_nha' => 3, 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_tang' => '9', 'id_toa_nha' => 3, 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_tang' => '10', 'id_toa_nha' => 3, 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_tang' => '11', 'id_toa_nha' => 3, 'created_at' => Now(), 'updated_at' => Now()],
        ]);
    }
}
