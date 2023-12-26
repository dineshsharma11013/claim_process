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
        Schema::create('form_g_mdls', function (Blueprint $table) {
            $table->id();
            
            $table->string('corporate_debtor_name');
            $table->string('debtor_pan');
            $table->string('debtor_cin_llp');
            $table->string('reg_address');
            $table->string('website');
            $table->text('place_details');
            $table->string('quantity');
            $table->string('value');
            $table->string('employee_workmen_number');
            $table->text('further_details');
            
            $table->string('eligibility');
            $table->string('last_date_recript');
            $table->string('prov_issue_date');
            $table->string('last_date_submission');
            $table->string('final_issue_date');
            $table->string('information_issue_date');
            $table->string('resolution_last_date');
            $table->string('process_email');

            $table->string('rem_addr');
            $table->enum('status',['1','2'])->defualt('1')->comment = "1 for active, 2 for deactive";
            $table->string('created_at');
            $table->string('updated_at');
            $table->string('deleted_at');

            $table->unsignedBigInteger('created_by_id');
            $table->foreign('created_by_id')->references('id')->on('general_info_mdls')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('form_g_mdls');
    }
};
