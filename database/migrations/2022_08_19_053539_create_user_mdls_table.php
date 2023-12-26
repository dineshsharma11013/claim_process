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
        Schema::create('user_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->string('unique_id');
            $table->string('password');
            $table->string('pwd');
            $table->string('creditor_type');
            $table->string('auth_type', 100);
            $table->string('rem_addr');
            $table->string('date');
            $table->string('status');
            $table->string('auth_id');
            $table->string('auth_check');
            $table->string('forgot_link');
            $table->string('created_at', 100);
            $table->string('updated_at', 100);
            $table->enum('deleted',['1','2'])->comment = "1-deleted, 2-not deleted";
            $table->string('deleted_by', 100);
            $table->string('deleted_time', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_mdls');
    }
};
