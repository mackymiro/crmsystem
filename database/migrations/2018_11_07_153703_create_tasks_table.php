<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('tasks')) {
			Schema::create('tasks', function (Blueprint $table) {
				$table->increments('id');
				$table->string('status');
				$table->string('assigned_to');
				$table->string('name');
				$table->string('subject');
				$table->string('due_date');
				$table->string('priority');
				$table->string('type');
				$table->text('comments');
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
        Schema::dropIfExists('tasks');
    }
}
