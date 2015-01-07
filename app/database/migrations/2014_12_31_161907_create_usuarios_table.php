<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function($table)
		{
			$table->increments('id');
			$table->string('uuid', 32);
		    $table->string('nombre', 64);
			$table->string('apellido', 64);
			$table->string('email')->unique();
			$table->integer('perfil_id');
			$table->string('password', 64);
			$table->string('remember_token', 64);
			$table->string('ruta_avatar', 128);
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
		//
	}

}
