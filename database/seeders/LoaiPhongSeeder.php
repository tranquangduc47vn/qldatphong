<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiPhongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loai_phong')->insert([
            ['ten_loai_phong' => 'Phòng học', 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_loai_phong' => 'Hội trường', 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_loai_phong' => 'Xưởng thực hành', 'created_at' => Now(), 'updated_at' => Now()],
        ]);
    }
}
