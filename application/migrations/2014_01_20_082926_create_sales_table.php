<?php

class Create_Sales_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales',function($table){
			$table->increments('id');
			$table->integer('customer_id')->unsigned();
			$table->foreign('customer_id')->references('name')->on('customers');
			$table->text('item1')->references('item_name')->on('stocks');
			$table->integer('item1_qty');
			$table->decimal('item1_rate',6,2);
			$table->text('item2')->references('item_name')->on('stocks');
			$table->integer('item2_qty');
			$table->decimal('item2_rate',6,2);
			$table->text('item3')->references('item_name')->on('stocks');
			$table->integer('item3_qty');
			$table->decimal('item3_rate',6,2);
			$table->text('item4')->references('item_name')->on('stocks');
			$table->integer('item4_qty');
			$table->decimal('item4_rate',6,2);
			$table->text('item5')->references('item_name')->on('stocks');
			$table->integer('item5_qty');
			$table->decimal('item5_rate',6,2);
			$table->text('item6')->references('item_name')->on('stocks');
			$table->integer('item6_qty');
			$table->decimal('item6_rate',6,2);
			$table->text('item7')->references('item_name')->on('stocks');
			$table->integer('item7_qty');
			$table->decimal('item7_rate',6,2);
			$table->text('item8')->references('item_name')->on('stocks');
			$table->integer('item8_qty');
			$table->decimal('item8_rate',6,2);
			$table->text('item9')->references('item_name')->on('stocks');
			$table->integer('item9_qty');
			$table->decimal('item9_rate',6,2);
			$table->text('item10')->references('item_name')->on('stocks');
			$table->integer('item10_qty');
			$table->decimal('item10_rate',6,2);
			$table->text('item11')->references('item_name')->on('stocks');
			$table->integer('item11_qty');
			$table->decimal('item11_rate',6,2);
			$table->text('item12')->references('item_name')->on('stocks');
			$table->integer('item12_qty');
			$table->decimal('item12_rate',6,2);
			$table->text('item13')->references('item_name')->on('stocks');
			$table->integer('item13_qty');
			$table->decimal('item13_rate',6,2);
			$table->text('item14')->references('item_name')->on('stocks');
			$table->integer('item14_qty');
			$table->decimal('item14_rate',6,2);
			$table->text('item15')->references('item_name')->on('stocks');
			$table->integer('item15_qty');
			$table->decimal('item15_rate',6,2);
			$table->text('item16')->references('item_name')->on('stocks');
			$table->integer('item16_qty');
			$table->decimal('item16_rate',6,2);
			$table->text('item17')->references('item_name')->on('stocks');
			$table->integer('item17_qty');
			$table->decimal('item17_rate',6,2);
			$table->text('item18')->references('item_name')->on('stocks');
			$table->integer('item18_qty');
			$table->decimal('item18_rate',6,2);
			$table->text('item19')->references('item_name')->on('stocks');
			$table->integer('item19_qty');
			$table->decimal('item19_rate',6,2);
			$table->text('item20')->references('item_name')->on('stocks');
			$table->integer('item20_qty');
			$table->decimal('item20_rate',6,2);
			$table->text('item21')->references('item_name')->on('stocks');
			$table->integer('item21_qty');
			$table->decimal('item21_rate',6,2);
			$table->decimal('total_cost',6,2);
			$table->decimal('total_paid',6,2);
			$table->decimal('discount',6,2);
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
		Schema::drop('table');
	}

}