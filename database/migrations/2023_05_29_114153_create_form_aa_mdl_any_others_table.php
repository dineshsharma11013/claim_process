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
        Schema::create('form_aa_mdl_any_others', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_aa_id');
            $table->foreign('form_aa_id')->references('id')->on('form_aa_mdls')->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_of_process_date_consent');
            $table->string('created_at');
            $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_aa_mdl_any_others');
    }
};
