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
        Schema::create('todo_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('task');
            $table->text('assigned_to');
            $table->text('message');
            $table->enum('status',['pending','completed','in_process','not_done'])->defualt('pending');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('set_as_draft');
            $table->string('rem_addr');
            $table->string('created_at');
            $table->string('updated_at');
            $table->string('deleted_at');

            $table->unsignedBigInteger('created_by_id');
            $table->foreign('created_by_id')->references('id')->on('general_info_mdls')->onDelete('cascade')->onUpdate('cascade');
            $table->string('updated_by');
            $table->string('deleted_by');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_mdls');
    }
};
