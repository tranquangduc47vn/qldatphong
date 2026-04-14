<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tang = DB::table('tang')->where('id_toa_nha', 3)->get();

        DB::table('phong')->insert([
            [
                'ten_phong' => 'Xưởng thực hành bộ môn CNTT', 
                'id_loai_phong' => 3, 
                'id_co_so' => 2, 
                'id_tang' => 1, 
                'id_toa_nha' => 1,
                'created_at' => Now(), 
                'updated_at' => Now(),
            ],
    
            [
                'ten_phong' => 'Hội trường', 
                'id_loai_phong' => 2, 
                'id_co_so' => 2, 
                'id_tang' => 2, 
                'id_toa_nha' => 2, 
                'created_at' => Now(), 
                'updated_at' => Now(),
            ],
        ]);

        foreach ($tang as $t) {
            for ($i = 1; $i <= 25; $i++) {
                if ($i < 10) {
                    DB::table('phong')->insert([
                        [
                            'ten_phong' => '0'.$i, 
                            'id_loai_phong' => 1, 
                            'id_co_so' => 2, 
                            'id_tang' => $t->id_tang, 
                            'id_toa_nha' => 3, 
                            'created_at' => Now(), 
                            'updated_at' => Now(),
                        ],
                    ]);
                } else {
                    DB::table('phong')->insert([
                        [
                            'ten_phong' => $i, 
                            'id_loai_phong' => 1, 
                            'id_co_so' => 2, 
                            'id_tang' => $t->id_tang, 
                            'id_toa_nha' => 3, 
                            'created_at' => Now(), 
                            'updated_at' => Now(),
                        ],
                    ]);
                }
            }
        }
    }
}
