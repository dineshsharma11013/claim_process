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
        Schema::create('form2_mdl_disclosures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form2_id');
            $table->foreign('form2_id')->references('id')->on('form2_mdls')->onDelete('cascade')->onUpdate('cascade');
            $table->text('discosures');
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
        Schema::dropIfExists('form2_mdl_disclosures');
    }
};
