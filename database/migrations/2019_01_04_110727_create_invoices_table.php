<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('client_id');
			$table->integer('case_id');
			$table->string('contact_name');
			$table->string('case_name');
			$table->string('invoice_number');
			$table->string('item_code');
			$table->string('reference');
			$table->string('amount');
			$table->string('vat_amount');
			$table->string('total_amount');
			$table->string('amount_due');
			$table->string('status');
			$table->string('created_by');
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
        Schema::dropIfExists('invoices');
    }
}
