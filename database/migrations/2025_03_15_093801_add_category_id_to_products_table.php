<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //thêm 1 trường vào bảng đã có
            $table->unsignedBigInteger('category_id')->after('ten_san_pham')->nullable();
            //tạo liên kết
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //xoá lket trc
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
