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
        Schema::create('form_c_a_senction_mdls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_mdls')->onDelete('cascade')->onUpdate('cascade');
            $table->string('form_ca_selected_id', 50);
            $table->unsignedBigInteger('form_ca_id');
            $table->foreign('form_ca_id')->references('id')->on('financial_creditor_form_ca_mdls')->onDelete('cascade');
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
        Schema::dropIfExists('form_c_a_senction_mdls');
    }
};
