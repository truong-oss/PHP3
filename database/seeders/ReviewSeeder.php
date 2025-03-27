<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('reviews')->insert([
            [
            'reviewer_name' => 'Nguyễn Văn C',
            'rating' => 5,
            'comment' => 'Bài viết rất hay và hữu ích!',
            'post_id' => 1, // Giả sử bài viết có ID = 1
            'created_at' => now(),
            ],
            [
                'reviewer_name' => 'Trần Thị D',
            'rating' => 4,
            'comment' => 'Nội dung bài viết tốt nhưng cần bổ sung thêm thông tin.',
            'post_id' => 2, // Giả sử bài viết có ID = 2
            'created_at' => now(),
            ]
            ]);
    }
}
