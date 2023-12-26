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
        Schema::create('form_a_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('company_id');
            
            $table->string('assign_company_mdls_id', 10);
            $table->string('incorporation_date');
            $table->string('corporate_debtor_authority');
            $table->string('corporate_debtor_identity_number');
            $table->string('corporate_debtor_address');
            $table->string('corporate_debtor_insolvency_date');
            $table->string('insolvency_closing_date');
            $table->string('insolvency_professional_name');
            $table->string('insolvency_professional_registration_number');
            $table->string('resolution_professional_address');
            $table->string('resolution_professional_email');
            $table->string('correspondence_resolution_professional_address');
            $table->string('correspondence_resolution_professional_email');
            $table->string('claim_last_date');
            $table->string('authorized_forms');
            $table->string('authorized_details');
            $table->string('creditor_classess');
            $table->string('insolvency_name');
            $table->string('interim_resolution_name');
            $table->string('interim_resolution_signature');
            $table->string('date');
            $table->string('place');

            $table->string('created_time');
            $table->unsignedBigInteger('created_by_id');
            $table->foreign('created_by_id')->references('id')->on('general_info_mdls')->onDelete('cascade')->onUpdate('cascade');
            $table->string('update_time');
            $table->string('updated_by');
            $table->enum('deleted',['1','2'])->defualt('2')->comment = "1 for yes, 2 for no";
            $table->string('deleted_time');
            $table->string('deleted_by');

            $table->string('rem_addr', 100);
            $table->enum('status',['1','2'])->defualt('1')->comment = "1 for active, 2 for deactive";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_a_mdls');
    }
};
