<?php

class Create_Customers_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers',function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('address');
			$table->integer('phone');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}