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
        Schema::create('operational_creditor_mdls', function (Blueprint $table) {
            $table->id();
            $table->string('company', 20);
            $table->string('irp', 20);
            $table->string('formA', 20);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_mdls')->onDelete('cascade');
            $table->string('form_type', 80);
            $table->string('ar', 50);
            $table->string('form_b_selected_id', 58);
            $table->string('operational_creditor_name', 80);
            $table->string('operational_creditor_address', 150);
            $table->string('identification_number', 50);
            $table->string('operational_creditor_correspondence_address', 150);
            $table->string('operational_creditor_email', 80);
            $table->string('total_amount', 40);
            $table->string('principle_amount', 40);
            $table->string('interest', 40);
            $table->text('document_details');
            $table->text('any_dispute_deatails');
            $table->text('debt_incurred_details');
            $table->text('any_mutual_details');
            $table->text('any_security_details');
            $table->string('account_number', 30);
            $table->string('bank_name', 70);
            $table->string('ifsc_code', 50);
            $table->string('document_attached_list');
            $table->string('operational_creditor_signature', 80);
            $table->string('creditor_relation', 255);
            $table->string('signing_person_address');
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
        Schema::dropIfExists('operational_creditor_mdls');
    }
};
