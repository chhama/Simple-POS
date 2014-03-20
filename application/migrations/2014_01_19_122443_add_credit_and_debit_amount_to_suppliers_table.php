<?php

class Add_Credit_And_Debit_Amount_To_Suppliers_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('suppliers',function($table){
			$table->decimal('credit',8,2);
			$table->decimal('debit',8,2);
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}