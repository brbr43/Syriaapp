<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ربط مع جدول users
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('record_number');
            $table->string('residence_place');
            $table->text('bio');
            $table->string('image_path')->nullable(); // الصورة
            $table->timestamps();

            // مفتاح أجنبي يربط مع جدول users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_data');
    }
};
