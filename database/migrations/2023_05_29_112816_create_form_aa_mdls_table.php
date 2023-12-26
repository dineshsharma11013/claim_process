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
        Schema::create('form_aa_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('first_date');
            $table->string('from_name');
            $table->string('registeration_number_insolvency_professional');
            $table->string('address_of_insolvency_professional');
            $table->string('address');
            $table->string('email_id');
            $table->string('name_of_corporate_debtor');
            $table->string('insolvency_professional_name');
            $table->string('insolvency_agency_name');
            $table->string('commeetee_name');
            $table->string('section');
            $table->string('process_of_name_of_corporate_debtor');
            $table->string('no_of_interim_resolution_professional');
            $table->string('rp_of_corporate_debtor');
            $table->string('rp_of_individuals');
            $table->string('liquidator_of_liquidation_process');
            $table->string('voluntary_liquiadation_process');
            $table->string('bank_cruptancy_trustee');
            $table->string('authorise_represantatvie');
            $table->string('date');
            $table->string('place');
            $table->string('signature_of_ip');
            $table->string('registeration_number');
            $table->string('authorisation_assignment_valid_till');
            $table->string('regd_address');
            $table->string('down_date');
            $table->string('down_place');
            
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
        Schema::dropIfExists('form_aa_mdls');
    }
};
