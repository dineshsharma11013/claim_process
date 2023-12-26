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
        Schema::create('assign_company_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('main_id', 100);
            $table->string('update_id', 100);
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('company_dtls')->onDelete('cascade');
            $table->unsignedBigInteger('ip_id');
            $table->foreign('ip_id')->references('id')->on('general_info_mdls')->onDelete('cascade');
            
            $table->string('designation', 100);
            $table->string('appointment_date', 100);
            $table->string('termination_date', 100);

            $table->enum('status',['1','2'])->defualt('1')->comment = "1 for active, 2 for deactive";
            $table->string('rem_addr', 100);
        
            $table->string('created_time');
            $table->unsignedBigInteger('created_by_id');
            $table->foreign('created_by_id')->references('id')->on('general_info_mdls')->onDelete('cascade')->onUpdate('cascade');
            $table->string('update_time');
            $table->string('updated_by');
            $table->enum('deleted',['1','2'])->defualt('2')->comment = "1 for yes, 2 for no";
            $table->string('deleted_time');
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
        Schema::dropIfExists('assign_company_mdls');
    }
};
