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
        Schema::create('form_d_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('company', 20);
            $table->string('irp', 20);
            $table->string('formA', 20);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_mdls')->onDelete('cascade');
            $table->string('form_type', 80);
            $table->string('ar', 50);
            $table->string('form_d_selected_id', 58);

            $table->string('name', 80);
            $table->string('pancard_no', 50);
            $table->string('passport_no', 50);
            $table->string('voter_id_no', 50);
            $table->string('aadhar_no', 50);
            $table->string('address', 150);
            $table->string('email', 80);
            $table->string('total_amount', 100);
            $table->string('principle', 100);
            $table->string('intrest', 100);
            $table->text('details_of_documents');
            $table->text('dispute_details');
            $table->text('claim_arose_details');
            $table->text('mutual_credit_details');
            $table->string('account_no', 100);
            $table->string('bank_name', 100);
            $table->string('ifsc_code',100);
            $table->string('operational_creditor_signature', 120);
            $table->string('name_in_block_letter', 100);
            $table->string('relation_to_creditor', 255);
            $table->string('address_person_signing', 255);

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
        Schema::dropIfExists('form_d_mdls');
    }
};
