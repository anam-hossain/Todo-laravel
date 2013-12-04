<?php

use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('todos', function($table)
        {
            
           	$table->increments('id');
            $table->text('todo');
            $table->timestamp('due')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }

}