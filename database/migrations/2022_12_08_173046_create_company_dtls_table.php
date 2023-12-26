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
        Schema::create('company_dtls', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 50);
            $table->string('name');
            $table->string('address');
            $table->string('insolvency_commencement_date', 100);
            $table->string('nclt');
            $table->string('claim_filing_date', 100);
            $table->string('start_date', 100);
            $table->string('end_date', 100);
            $table->enum('status',['1','2'])->defualt('1')->comment = "1 for active, 2 for deactive";
            $table->string('rem_addr', 100);
            $table->string('created_at', 100);
            $table->string('updated_at', 100);
            $table->enum('deleted',['1','2'])->defualt('2')->comment = "1 for Yes, 2 for No";
            $table->string('deleted_by', 100);
            $table->string('deleted_time', 100);    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_dtls');
    }
};
