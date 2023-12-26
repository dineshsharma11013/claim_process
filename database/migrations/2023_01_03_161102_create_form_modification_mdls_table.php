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
        Schema::create('form_modification_mdls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_mdls')->onDelete('cascade');
            $table->string('form_type', 200);
            $table->string('form_id', 50);
            $table->string('msg');
            $table->string('date', 100);
            $table->string('rem_addr', 100);
            $table->enum('approval_status',['1','2'])->defualt('2')->comment = "1 - approved, 2 - not approved";
            $table->string('approval_person_id',50)->comment = "approved person id";
            $table->string('approval_by_date',50)->comment = "approved time";
            $table->enum('status',['1','2'])->defualt('2')->comment = "1 - read, 2 - unread";
            $table->string('request_sent_time', 50)->comment = "request to edit form time";
            $table->string('request_seen_time', 50);
            $table->enum('form_update_status',['1','2'])->defualt('2')->comment = "1 - updated, 2 - not updated";
            $table->string('form_update_time', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_modification_mdls');
    }
};
