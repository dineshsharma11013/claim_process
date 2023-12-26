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
        Schema::create('case_assign_mdls', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('created_by_id');
            $table->foreign('created_by_id')->references('id')->on('general_info_mdls')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('company_dtls')->onDelete('cascade')->onUpdate('cascade');

            $table->string('assigned_to');
            $table->text('cases');

            $table->string('rem_addr');
            $table->enum('status',['1','2'])->defualt('1')->comment = "1 for Enable, 2 for Disable";
            $table->string('created_at');
            $table->string('updated_at');
            $table->string('deleted_at');

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
        Schema::dropIfExists('case_assign_mdls');
    }
};
