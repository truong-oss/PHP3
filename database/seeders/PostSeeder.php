<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('posts')->insert([
            [
            'tieu_de' => 'Bài viết đầu tiên',
            'bai_viet' => 'Đây là nội dung của bài viết đầu tiên.',
            'tac_gia' => 'Nguyễn Văn A',
            'trang_thai' => true,
            'created_at' => now(),
           
            ],
            [
        'tieu_de' => 'Bài viết thứ hai',
            'bai_viet' => 'Đây là nội dung của bài viết thứ hai.',
            'tac_gia' => 'Trần Thị B',
            'trang_thai' => true,
            'created_at' => now(),
            ]
            ]);
    }
}
