<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table){
			$table->increments('id') ;
			$table->string('username',50);
			$table->string('password',60);
			$table->timestamps();
		});
		$user=new User();
		$user->username='admin';
		$user->password=Hash::make('password');
		$user->save();
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}