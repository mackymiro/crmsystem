<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('clients')) {
			Schema::create('clients', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title');
				$table->string('first_name');
				$table->string('middle_name');
				$table->string('last_name');
				$table->string('company');
				$table->string('contact_status');
				$table->date('dob');
				$table->string('profession');
				$table->string('phone_number');
				$table->string('email')->unique();
				$table->string('mobile_number');
				$table->string('referral');
				$table->string('commission');
				$table->string('employment_type');
				$table->string('national_insurance');
				$table->string('utr');
				$table->string('registered');
				$table->string('authority_letter');
				$table->string('monthly_percentage');
				$table->string('pay_day');
				$table->string('bank_authority');
				$table->string('bank_name');
				$table->string('bank_acct_number');
				$table->string('bank_shortcode');
				$table->string('change_percentage');
				$table->string('payment_frequency');
				$table->string('street');
				$table->string('city');
				$table->string('province');
				$table->string('zip');
				$table->string('country');
				$table->text('description');
				$table->string('owner');
				$table->integer('process_profiled');
				$table->integer('process_packout');
				$table->integer('process_pack_received');
				$table->integer('process_in_processing');
				$table->integer('process_submitted');
				$table->integer('process_money_received');
				$table->integer('process_client_on_paylist');
				$table->integer('process_client_paid');
				$table->timestamps();
			});
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
