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
        Schema::create('ar_creditor_class_mdls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ar_id');
            $table->foreign('ar_id')->references('id')->on('form_a_mdls')->onDelete('cascade');
            $table->string('creditor_classess');
            $table->string('ar1', 100);
            $table->string('ar2', 100);
            $table->string('ar3', 100);

            $table->string('created_time');
            $table->unsignedBigInteger('created_by_id');
            $table->foreign('created_by_id')->references('id')->on('general_info_mdls')->onDelete('cascade')->onUpdate('cascade');
            $table->string('update_time');
            $table->string('updated_by');
            $table->enum('deleted',['1','2'])->defualt('2')->comment = "1 for yes, 2 for no";
            $table->string('deleted_time');
            $table->string('deleted_by');

            $table->enum('status',['1','2'])->defualt('1')->comment = "1 for active, 2 for deactive";
            $table->string('rem_addr', 100);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_creditor_class_mdls');
    }
};
