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
        Schema::create('form_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('corporate_person_name');
            $table->string('incorporation_date');
            $table->string('authority_person');
            $table->string('corporate_identity_number');
            $table->string('corporate_person_address');
            $table->string('commencement_date');
            $table->string('ld_name');
            $table->string('ld_address');
            $table->string('ld_email');
            $table->string('ld_contact');
            $table->string('registered_number');
            $table->string('last_date');
            
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
        Schema::dropIfExists('form_a_s');
    }
};
