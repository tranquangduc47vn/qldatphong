<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phong = DB::table('phong')
                    -> where('id_phong', 1)
                    -> orWhere('id_phong', 2)
                    -> orWhere('id_phong', 3)
                    -> orWhere('id_phong', 4)
                    -> orWhere('id_phong', 5)
                    -> get();
        foreach ($phong as $p) {
            DB::table('booking')->insert([
                [
                    'ngay_dat' => Now(),
                    'ngay_to_chuc' => Now(),
                    'thoi_gian_bat_dau' => '7:30:00',
                    'su_kien' => 'Event '.$p->id_phong,
                    'id_bo_mon' => 1,
                    'id_user' => 3,
                    'id_phong' => $p->id_phong, 
                    'id_ca_hoc' => 1,
                    'created_at' => Now(), 
                    'updated_at' => Now(),
                ],
            ]);
        }
    }
}
