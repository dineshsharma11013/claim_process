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
        Schema::create('form2_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('ip_ipe');
            $table->string('sction');
            $table->string('name_authorised_signature');
            $table->string('first_date');
            $table->string('conclusion');
            $table->string('signature_of_ip');
            $table->string('bank_cruptancy_trustee_individual');
            $table->string('individual_processes_rp_number');
            $table->string('no_of_irp_assignment');

            $table->string('number_of_any_other_assignment');
            $table->string('address');
            $table->string('email');
            $table->string('office_address');
            $table->string('contact_number');
            $table->string('vs_name_of_corporate_debtor');

            $table->string('name_of_proposed_resolution');
            $table->string('name_of_insolvency_professional_agency');
            $table->string('rehgisteration_number');
            $table->string('name_of_creditor');
            $table->string('insovency_resolution_corporate_debtor');
            $table->string('inter_registration_number');
            $table->string('signing_person_name');

            $table->string('optional_certificate');
            $table->string('date');
            $table->string('name');
            $table->string('number_of_rp_assgnmt');
            $table->string('numbr_of_lqdtr_voluntry');
            $table->string('form_2_mdl_no_of_ar_assign_corporate_process');

            $table->string('created_time');
            $table->unsignedBigInteger('created_by_id');
            $table->foreign('created_by_id')->references('id')->on('general_info_mdls')->onDelete('cascade')->onUpdate('cascade');
            $table->string('update_time');
            $table->string('updated_by');
            $table->enum('deleted',['1','2'])->defualt('2')->comment = "1 for yes, 2 for no";
            $table->string('deleted_time');
            $table->string('deleted_by');

            $table->string('rem_addr', 100);
            $table->string('unique_id', 150);
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
        Schema::dropIfExists('form2_mdls');
    }
};
