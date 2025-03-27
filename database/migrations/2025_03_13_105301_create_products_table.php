<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** mặc định trog 1 file migration bắt buộc p có đủ hàm Up và hàm Down
     * hàm Up dùng để chỉnh sửa cập nhật cơ sở dữ liệu
     * hàm Down là những công việc ngược lại so vơi hàm Up
     * Run the migrations.
     */
    //
    public function up(): void
    {

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ma_san_pham', 20)->unique(); //quy định độ dài và ko cho phép trùng nhau
            $table->string('ten_san_pham');
            $table->decimal('gia', 10, 2);
            $table->decimal('gia_khuyen_mai', 10, 2)->nullable();// nulable cho phép chứa giá chị null;
            $table->unsignedInteger('so_luong');//số nguyên dương
            $table->date('ngay_nhap');
            $table->text('mo_ta')->nullable();
            $table->boolean('trang_thai')->default(true);//xét giá trị defau mặc định
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
