<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
            $table->date('birth_date');
            $table->date('donation_list_date');
            $table->string('phone');
			$table->string('email');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->string('password');
			$table->string('name');
            $table->boolean('is_active')->default(1);
//            $table->string('status',50)->nullable();
            $table->integer('pine_code')->nullable();
            $table->string('api_token',60)->unique()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
