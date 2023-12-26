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
        Schema::create('form_f_files_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('company', 20);
            $table->string('irp', 20);
            $table->string('formA', 20);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_mdls')->onDelete('cascade');
            $table->string('form_f_selected_id', 50);
            $table->unsignedBigInteger('form_f_id');
            $table->foreign('form_f_id')->references('id')->on('other_creditor_form_f_mdls')->onDelete('cascade');
            $table->string('work_purchase_order', 10);
            $table->string('invoices', 10);
            $table->string('balance_confirmation', 10);
            $table->string('any_correspondence', 10);
            $table->string('authorisation_letter', 10);
            $table->string('bank_statement', 10);
            $table->string('ledger_copy', 10);
            $table->string('computation_sheet', 10);
            $table->string('work_purchase_order_file', 80);
            $table->string('invoices_file', 80);
            $table->string('balance_confirmation_file', 80);
            $table->string('any_correspondence_file', 80);
            $table->string('authorisation_letter_file', 80);
            $table->string('bank_statement_file', 80);
            $table->string('ledger_copy_file', 80);
            $table->string('computation_sheet_file', 80);
            $table->string('pan_number_file', 80);
            $table->string('passport_file', 80);
            $table->string('aadhar_card', 80);
            $table->enum('submitted',['1','2'])->comment = "1 for yes, 2 for no";
            $table->string('unique_id', 150);
            $table->string('rem_addr', 80);
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
        Schema::dropIfExists('form_f_files_mdls');
    }
};
