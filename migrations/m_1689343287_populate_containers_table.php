<?php

use app\core\Seeder;
use app\models\products\Container;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1689343287_populate_containers_table extends Seeder
{
	protected function table(): string
	{
		return Container::tableName();
	}

	public function up()
	{
		$this->add(
			$this->data()->name('Bottle')->description('Take your favorite beverages with you in our spill-proof grab-and-go bottles. Designed for convenience and portability, they come pre-filled with refreshing drinks, ready to fuel your day.')->price(2000),
			$this->data()->name('Flask')->description("Your beverages stay hot or cold for hours with our spill-proof insulated thermos. Whether it's coffee, tea, or chilled refreshments, enjoy them anytime, anywhere.")->price(4500),
			$this->data()->name('Plastic Cup')->description('Transparent plastic cups with accompanying lids and straws to minimize spills and offer convenience.')->price(1000),
			$this->data()->name('Paper Cup')->description('Portable, convient paper cups with accompanying lids.')->price(700),
		);

		$this->seed();
	}
}
