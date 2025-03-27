<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('customers')->insert([
            [
                'ten' => 'Hoàng Minh',
                'email' => 'hoangminh@example.com',
                'sdt' => '0123456789',
                'dia_chi' => 'Hà Nội',
                'created_at' => now(),
                
            ],
            [
                'ten' => 'Nguyễn Thảo',
                'email' => 'nguyenthao@example.com',
                'sdt' => '0987654321',
                'dia_chi' => 'TP.HCM',
                'created_at' => now(),
                
            ]
            ]);
    }
}
