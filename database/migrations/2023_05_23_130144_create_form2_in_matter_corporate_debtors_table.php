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
        Schema::create('form2_in_matter_corporate_debtors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ip_id');
            $table->foreign('ip_id')->references('id')->on('general_info_mdls')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('form2_id');
            $table->foreign('form2_id')->references('id')->on('form2_mdls')->onDelete('cascade')->onUpdate('cascade');
            $table->string('in_matter_corporate_debtor_name');
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
        Schema::dropIfExists('form2_in_matter_corporate_debtors');
    }
};
