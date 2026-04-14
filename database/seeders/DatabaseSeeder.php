<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $this->call(BoMonSeeder::class);
        $this->call(CaHocSeeder::class);
        $this->call(CoSoSeeder::class);
        $this->call(LoaiPhongSeeder::class);
        $this->call(ToaNhaSeeder::class);
        $this->call(TangSeeder::class);
        $this->call(PhongSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(BookingSeeder::class);
    }
}
