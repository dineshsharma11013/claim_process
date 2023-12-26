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
        Schema::create('form_e_approval_mdls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_e_id');
            $table->foreign('form_e_id')->references('id')->on('form_e_file_mdls')->onDelete('cascade');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('general_info_mdls')->onDelete('cascade');
            $table->text('reason');
            $table->enum('status',['1','2','3'])->comment = "1 for approved, 2 for pending, 3 for rejected";
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
        Schema::dropIfExists('form_e_approval_mdls');
    }
};
