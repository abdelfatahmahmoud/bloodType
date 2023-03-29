<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('hospital_name');
			$table->string('patient_phone');
			$table->integer('city_id')->unsigned();
			$table->string('hospital_addres');
			$table->integer('count_bage');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('patient_age');
			$table->integer('client_id')->unsigned();
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->text('description');
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}