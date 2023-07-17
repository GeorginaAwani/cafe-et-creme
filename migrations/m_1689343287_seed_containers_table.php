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
	protected function model(): string
	{
		return Container::class;
	}

	private function data_array(): array
	{
		return [
			['name' => 'Bottle', 'description' => 'Take your favorite beverages with you in our spill-proof grab-and-go bottles. Designed for convenience and portability, they come pre-filled with refreshing drinks, ready to fuel your day.', 'price' => 2000],
			['name' => 'Flask', 'description' => "Your beverages stay hot or cold for hours with our spill-proof insulated thermos. Whether it's coffee, tea, or chilled refreshments, enjoy them anytime, anywhere.", 'price' => 4500],
			['name' => 'Plastic Cup', 'description' => 'Transparent plastic cups with accompanying lids and straws to minimize spills and offer convenience.', 'price' => 1000],
			['name' => 'Paper Cup', 'description' => 'Portable, convient paper cups with accompanying lids.', 'price' => 700],
		];
	}

	public function up()
	{
		foreach ($this->data_array() as $container) {
			$containerData = $this->data();
			foreach ($container as $property => $value) {
				$containerData->set($property, $value);
			}

			$containerData->set('image', '');
			$this->add($containerData);
		}

		$this->seed();
	}
}
