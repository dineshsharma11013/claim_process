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
        Schema::create('other_creditor_form_f_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('company', 20);
            $table->string('irp', 20);
            $table->string('formA', 20);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_mdls')->onDelete('cascade');
            $table->string('form_type', 80);
            $table->string('ar', 50);   
            $table->string('form_f_selected_id', 58);
            $table->string('fc_name', 80);
            $table->string('fc_identification_number', 80);
            $table->string('fc_address', 150);
            $table->string('fc_email', 80);
            $table->string('claim_amt', 100);
            $table->text('claim_amt_desc');
            $table->text('document_details');
            $table->text('claim_details');
            $table->text('other_mutual_details');
            $table->text('security_held');
            $table->string('bank_account_number', 80);
            $table->string('bank_name', 80);
            $table->string('bank_ifsc_code', 80);
            $table->string('fc_signature', 80);
            $table->string('creditor_position', 150);
            $table->string('signing_address', 100);
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
        Schema::dropIfExists('other_creditor_form_f_mdls');
    }
};
