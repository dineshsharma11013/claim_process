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
        Schema::create('form_e_employee_detail_mdls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_mdls')->onDelete('cascade');
            $table->string('form_e_selected_id', 50);
            $table->unsignedBigInteger('form_e_id');
            $table->foreign('form_e_id')->references('id')->on('form_e_file_mdls')->onDelete('cascade');
            $table->string('employee_name', 150);
            $table->string('id_number', 80);
            $table->string('id_details', 80);
            $table->string('total_amt', 50);
            $table->string('due_amt_period');
            $table->enum('submitted',['1','2'])->comment = "1 for yes, 2 for no";
            $table->string('unique_id', 150);
            $table->string('rem_addr', 80);
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
        Schema::dropIfExists('form_e_employee_detail_mdls');
    }
};
