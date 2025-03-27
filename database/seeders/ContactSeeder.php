<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('contacts')->insert([
            [
            'ten' => 'Lê Văn E',
            'email' => 'levane@example.com',
            'phone' => '0987654321',
            'tin_nhan' => 'Tôi quan tâm đến sản phẩm của bạn.',
            'created_at' => now(),
            ],
            [
                'ten' => 'Phạm Thị F',
            'email' => 'phamthif@example.com',
            'phone' => null,
            'tin_nhan' => 'Vui lòng gửi thêm thông tin chi tiết.',
            'created_at' => now(),
            ]
            ]);
    }
}
