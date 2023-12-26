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
        Schema::create('form_e_file_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('irp');
            $table->string('formA');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_mdls')->onDelete('cascade');
            $table->string('form_type', 80);
            $table->string('ar', 50);   
            $table->string('form_e_selected_id', 58);
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
            $table->string('operational_creditor_signature', 80);
            $table->string('unique_id');
            $table->string('year', 20);
            $table->string('dat', 20)->comment = "updated by admin";
            $table->string('admin_id',20)->comment = "updated by admin";
            $table->string('updated_date', 30)->comment = "updated by admin";
            $table->enum('submitted',['1','2'])->comment = "1 for yes, 2 for no";
            $table->enum('mailed',['1','2'])->defualt('2')->comment = "1 for active, 2 for deactive";
            $table->string('dat_update_user', 20)->comment = "done by user";
            $table->string('date', 30)->comment = "done by user";
            $table->enum('flag',['1','2'])->defualt('2')->comment = "1 for seen, 2 for unseen (for notification) ";
            $table->enum('deleted',['1','2'])->defualt('2')->comment = "1 Yes, 2 No";
            $table->enum('status',['1','2'])->comment = "1 for new, 2 for updated";
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
        Schema::dropIfExists('form_e_file_mdls');
    }
};
