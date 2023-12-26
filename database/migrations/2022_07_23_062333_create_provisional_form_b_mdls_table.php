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
        Schema::create('provisional_form_b_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('creditor_type');
            $table->string('creditor_name');
            $table->string('registered_email');
            $table->string('address');
            $table->string('mobile');
            $table->string('principal_amount');
            $table->string('interest');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('ifsc_code');
            $table->string('authorised_person_name');
            $table->string('authorized_person_address');
            $table->string('operational_creditor_signature');
            $table->string('authorized_representative_signature');
            $table->string('identification_number');
            $table->text('document_details_reference');
            $table->text('document_any_dispute');
            $table->text('debt_incurred_details');
            $table->text('mutual_credit_details');
            $table->text('any_details');
            $table->text('list_of_documents');
            $table->string('rem_addr');
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
        Schema::dropIfExists('provisional_form_b_mdls');
    }
};
