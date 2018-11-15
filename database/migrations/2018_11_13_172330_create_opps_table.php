<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opps', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('client_id');
			$table->string('code');
			$table->string('contacts');
			$table->string('case_name');
			$table->string('case_stage');
			$table->string('description');
			$table->decimal('estimated_amount', 10, 2);
			$table->decimal('actual_amount', 10, 2);
			$table->string('national_insurance');
			$table->string('registered');
			$table->string('charge_percentage');
			$table->string('utr');
			$table->string('authority_letter');
			$table->string('bank_authority');
			$table->string('owner');
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
        Schema::dropIfExists('opps');
    }
}
