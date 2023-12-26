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
        Schema::create('form_b_approval_mdls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_b_id');
            $table->foreign('form_b_id')->references('id')->on('operational_creditor_mdls')->onDelete('cascade');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('general_info_mdls')->onDelete('cascade');
            $table->string('principal_amt');
            $table->string('interest');
            $table->string('total');
            $table->string('approved_principle_amt');
            $table->string('rejected_principle_amt');
            $table->string('approved_interest_amt');
            $table->string('rejected_interest_amt');
            $table->string('total_approval_amt');
            $table->string('total_rejected_amt');
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
        Schema::dropIfExists('form_b_approval_mdls');
    }
};
