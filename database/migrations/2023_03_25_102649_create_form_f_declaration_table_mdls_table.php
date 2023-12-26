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
        Schema::create('form_f_declaration_table_mdls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_mdls')->onDelete('cascade')->onUpdate('cascade');
            $table->string('form_f_selected_id', 50);
            $table->unsignedBigInteger('form_f_id');
            $table->foreign('form_f_id')->references('id')->on('other_creditor_form_f_mdls')->onDelete('cascade');
            $table->string('date');
            $table->text('senction_amt');
            $table->enum('submitted',['1','2'])->comment = "1 for yes, 2 for no";
            $table->string('unique_id', 150);
            $table->string('rem_addr', 70);
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
        Schema::dropIfExists('form_f_declaration_table_mdls');
    }
};
