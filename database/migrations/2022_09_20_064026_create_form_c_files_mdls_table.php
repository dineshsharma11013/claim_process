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
        Schema::create('form_c_files_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('company', 20);
            $table->string('irp', 20);
            $table->string('formA', 20);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_mdls')->onDelete('cascade');
            $table->string('form_c_selected_id', 50);
            $table->unsignedBigInteger('form_c_id');
            $table->foreign('form_c_id')->references('id')->on('finanicial_creditor_form_c_mdls')->onDelete('cascade');
            $table->string('work_purchase_order', 20);
            $table->string('invoices', 20);
            $table->string('balance_confirmation', 20);
            $table->string('any_correspondence', 20);
            $table->string('authorisation_letter', 20);
            $table->string('bank_statement', 20);
            $table->string('ledger_copy', 20);
            $table->string('computation_sheet', 20);
            $table->string('work_purchase_order_file', 150);
            $table->string('invoices_file', 150);
            $table->string('balance_confirmation_file', 150);
            $table->string('any_correspondence_file', 150);
            $table->string('authorisation_letter_file', 150);
            $table->string('bank_statement_file', 150);
            $table->string('ledger_copy_file', 150);
            $table->string('computation_sheet_file', 150);
            $table->string('pan_number_file', 150);
            $table->string('passport_file', 150);
            $table->string('aadhar_card', 150);
            $table->enum('submitted',['1','2'])->comment = "1 for yes, 2 for no";
            $table->string('unique_id', 150);
            $table->string('rem_addr', 70);
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
        Schema::dropIfExists('form_c_files_mdls');
    }
};
