<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // الاسم
            $table->string('email')->unique(); // البريد الإلكتروني
            $table->string('password'); // كلمة المرور
            $table->boolean('is_admin')->default(false); // عمود يحدد إذا كان المستخدم مديرًا
            $table->timestamps(); // حقول created_at و updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
