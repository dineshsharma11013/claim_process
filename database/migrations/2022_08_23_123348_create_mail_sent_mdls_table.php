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
        Schema::create('mail_sent_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('mail_type');
            $table->string('mail_from');
            $table->text('mail_to');
            $table->text('subject');
            $table->text('desc');
            $table->string('name');
            $table->string('email');
            $table->string('directory');
            $table->text('files');
            $table->string('url');
            $table->string('rem_addr');
            $table->string('output');
            $table->text('error');
            $table->string('error_msg');
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
        Schema::dropIfExists('mail_sent_mdls');
    }
};
