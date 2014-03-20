<?php

class Create_Dailypurchases_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dailypurchases',function($table){
			$table->increments('id');
			$table->text('item_name');
			$table->integer('item_qty');
			$table->decimal('item_rate',5,2);
			$table->decimal('total_paid',6,2);
			$table->decimal('total_credit',6,2);
			$table->decimal('total_cost',6,2);
			$table->text('supplier_name');
			$table->date('purchase_date');
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
		//
	}

}