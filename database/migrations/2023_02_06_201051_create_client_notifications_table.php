<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('client_notifications', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id')->unsigned();
			$table->integer('notification_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('client_notifications');
	}
}