<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoMonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bo_mon')->insert([
            ['ten_bo_mon' => 'CNTT', 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_bo_mon' => 'Quản trị kinh doanh', 'created_at' => Now(), 'updated_at' => Now()],
        ]);
    }
}
