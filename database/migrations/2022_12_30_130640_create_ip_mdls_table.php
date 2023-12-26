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
        Schema::create('ip_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 50);
            $table->string('user_admin_type', 50)->comment = "who is currently logged in";
            $table->string('name', 150);
            $table->string('company_name', 150);
            $table->string('address', 150);
            $table->string('email', 150);
            $table->string('mobile', 100);
            $table->string('password', 70);
            $table->string('pwd', 70);
            $table->string('ibbi_reg_no', 50);
            $table->string('gender', 50);
            $table->string('user_type', 50)->comment = "main ip id";
            $table->string('sub_user')->comment = "sub-user id";
            $table->text('rights');
            $table->string('profile_pic', 150);
            $table->enum('status',['1','2','3'])->defualt('1')->comment = "1-enable, 2-disable, 3-block";
            $table->string('date', 50);
            $table->enum('flag',['1','2'])->defualt('2')->comment = "1-deleted, 2-not deleted";
            $table->string('rem_addr');
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
        Schema::dropIfExists('ip_mdls');
    }
};
