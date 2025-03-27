<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //nơi để thêm dữ liệu
        // DB::table('products')->insert([
        //     [
        //         'ma_san_pham' => 'SP008',
        //         'ten_san_pham' => 'áo khoác',
        //         'category_id' => 1,
        //         'gia' => 150000,
        //         'gia_khuyen_mai' => 120000,
        //         'so_luong' => 50,
        //         'ngay_nhap' => '2025-03-15',
        //         'mo_ta' => 'áo kh s',
        //         'trang_thai' => true,
        //         'created_at' =>now(),
                
        //     ],
        //     [
        //         'ma_san_pham' => 'SP009',
        //         'ten_san_pham' => 'áo khoác 1',
        //         'category_id' => 1,
        //         'gia' => 150000,
        //         'gia_khuyen_mai' => 120000,
        //         'so_luong' => 50,
        //         'ngay_nhap' => '2025-03-15',
        //         'mo_ta' => 'áo kh s',
        //         'trang_thai' => true,
        //         'created_at' =>now(),
                
        //     ]
        //     ]);
        Category::factory()->count(3)->create()->each(function ($category){
            Product::factory()->count(6)->create(['category_id' => $category ->id]);
        });
        // Product::factory()->
    }
}
