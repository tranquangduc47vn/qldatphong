<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Thiên Phúc',
                'email' => 'ttphuc141195@gmail.com',
                'email_verified_at' => Now(),
                'password' => Hash::make('12345678'),
                'so_dien_thoai' => '0776349260',
                'role' => 1,
                'created_at' => Now(), 
                'updated_at' => Now(),
            ],

            [
                'name' => 'Admin',
                'email' => 'admin@fe.edu.vn',
                'email_verified_at' => Now(),
                'password' => Hash::make('12345678'),
                'so_dien_thoai' => '0123456789',
                'role' => 0,
                'created_at' => Now(), 
                'updated_at' => Now(),
            ],

            [
                'name' => 'Trần Thị Mỹ Tâm', 
                'so_dien_thoai' => '0383749441', 
                'email' => 'tranthimytam0721@gmail.com',
                'email_verified_at' => Now(),
                'password' => Hash::make('Tam@0923'),
                'role' => 1,
                'created_at' => Now(), 
                'updated_at' => Now(),
            ],
        ]);
    }
}
