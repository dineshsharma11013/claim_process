<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_info_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name');
            $table->string('address');
            $table->string('email');
            $table->string('mobile');
            $table->string('username');
            $table->string('password');
            $table->string('pwd');
            $table->string('ibbi_reg_no');
            $table->string('token');
            $table->string('gender');
            $table->string('user_type');
            $table->string('sub_user');
            $table->text('rights');
            $table->text('banners');
            $table->string('profile_pic');
            $table->string('link');
            $table->string('rem_addr');
            $table->string('status');
            $table->string('availability');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_info_mdls');
    }
};
