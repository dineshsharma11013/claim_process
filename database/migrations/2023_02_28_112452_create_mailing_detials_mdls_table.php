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
        Schema::create('mailing_detials_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('from', 100);
            $table->string('to', 100);
            $table->string('title');
            $table->text('subject');
            $table->text('desc');
            $table->string('path');
            $table->text('files');
            $table->string('date');
            $table->string('exact_time');
            $table->string('rem_addr');
            $table->string('created_at', 100);
            $table->string('updated_at', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailing_detials_mdls');
    }
};
