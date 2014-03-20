<?php

class Create_Stocks_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocks',function($table){
			$table->increments('id');
			$table->text('item_name');
			$table->text('brand');
			$table->integer('supplier_id');
			$table->integer('category_id');
			$table->integer('quantity');
			$table->decimal('rate',5,2);
			$table->integer('userid');
			$table->decimal('sp',5,2);
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
		Schema::drop('stocks');
	}

}