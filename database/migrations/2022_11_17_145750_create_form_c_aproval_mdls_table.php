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
        Schema::create('form_c_aproval_mdls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_c_id');
            $table->foreign('form_c_id')->references('id')->on('finanicial_creditor_form_c_mdls')->onDelete('cascade');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('general_info_mdls')->onDelete('cascade');
            $table->string('borrower_claim_amount');
            $table->string('borrower_security_interest_amount');
            $table->string('borrower_guarantee_amt');
            $table->string('borrower_guarantor_name');
            $table->string('borrower_guarantor_address');
            $table->string('guarantor_claim_amount');
            $table->string('guarantor_security_interest_amount');
            $table->string('guarantor_gaurantee_amt');
            $table->string('guarantor_principal_borrower');
            $table->string('guarantor_address_borrower');
            $table->string('financial_claim_amt');
            $table->string('financial_beneficiary_name');
            $table->string('financial_beneficiary_address');
            $table->text('reason');
            $table->enum('status',['1','2','3'])->comment = "1 for approved, 2 for pending, 3 for rejected";
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
        Schema::dropIfExists('form_c_aproval_mdls');
    }
};
