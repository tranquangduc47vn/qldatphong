<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoSoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('co_so')->insert([
            ['ten_co_so'=> 'Cơ sở Nguyễn Kiệm','dia_chi'=> '778/B1 đường Nguyễn Kiệm, Phường 4, Q. Phú Nhuận, Tp. HCM'],
            ['ten_co_so'=> 'Cơ sở CV Phần Mềm Quang Trung, Quận 12, TP.HCM','dia_chi'=> 'Công viên phần mềm Quang Trung, phường Tân Chánh Hiệp, quận 12, TP Hồ Chí Minh'],
        ]);
    }
}
