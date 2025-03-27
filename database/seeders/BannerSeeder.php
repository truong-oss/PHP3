<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('banners')->insert([
            [
                'tieu_de' => 'Khuyến mãi mùa hè',
                'image_url' => 'https://example.com/banner1.jpg',
                'trang_thai' => true,
                'created_at' => now(),
                
            ],
            [
                'tieu_de' => 'Giảm giá cuối năm',
                'image_url' => 'https://example.com/banner2.jpg',
                'trang_thai' => false,
                'created_at' => now(),
              
            ]
            ]);
    }
}
