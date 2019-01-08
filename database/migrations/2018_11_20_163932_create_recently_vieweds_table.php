<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecentlyViewedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if(!Schema::hasTable('recently_vieweds')) {
			Schema::create('recently_vieweds', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('lead_id');
				$table->integer('client_id');
				$table->string('status');
				$table->string('first_name');
				$table->string('last_name');
				$table->date('date');
				$table->string('flag_status');
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
        Schema::dropIfExists('recently_vieweds');
    }
}
