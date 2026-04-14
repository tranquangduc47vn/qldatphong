<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ca_hoc')->insert([
            ['ten_ca_hoc' => 'Ca 1', 'loai_ca_hoc' => 1, 'thoi_gian_bat_dau' => '7:15:00', 'thoi_gian_ket_thuc' => '9:15:00', 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_ca_hoc' => 'Ca 2', 'loai_ca_hoc' => 1, 'thoi_gian_bat_dau' => '9:25:00', 'thoi_gian_ket_thuc' => '11:25:00', 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_ca_hoc' => 'Ca 3', 'loai_ca_hoc' => 1, 'thoi_gian_bat_dau' => '12:00:00', 'thoi_gian_ket_thuc' => '14:00:00', 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_ca_hoc' => 'Ca 4', 'loai_ca_hoc' => 1, 'thoi_gian_bat_dau' => '14:10:00', 'thoi_gian_ket_thuc' => '16:10:00', 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_ca_hoc' => 'Ca 5', 'loai_ca_hoc' => 1, 'thoi_gian_bat_dau' => '16:20:00', 'thoi_gian_ket_thuc' => '18:20:00', 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_ca_hoc' => 'Ca 6', 'loai_ca_hoc' => 1, 'thoi_gian_bat_dau' => '18:30:00', 'thoi_gian_ket_thuc' => '20:30:00', 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_ca_hoc' => 'Buổi sáng', 'loai_ca_hoc' => 2, 'thoi_gian_bat_dau' => '7:00:00', 'thoi_gian_ket_thuc' => '12:00:00', 'created_at' => Now(), 'updated_at' => Now()],
            ['ten_ca_hoc' => 'Buổi chiều', 'loai_ca_hoc' => 2, 'thoi_gian_bat_dau' => '13:00:00', 'thoi_gian_ket_thuc' => '18:00:00', 'created_at' => Now(), 'updated_at' => Now()],
        ]);
    }
}
