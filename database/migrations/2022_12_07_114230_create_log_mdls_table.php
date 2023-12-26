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
        Schema::create('log_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('user_type', 100);
            $table->string('user_id', 20);
            $table->string('page_name', 100);
            $table->string('page_url');
            $table->string('mthd', 200);
            $table->string('action', 50);
            $table->string('action_output', 50);
            $table->string('err');
            $table->string('err_msg');
            $table->string('rem_addr');
            $table->string('date');
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
        Schema::dropIfExists('log_mdls');
    }
};
