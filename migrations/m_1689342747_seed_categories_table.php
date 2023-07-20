<?php

use app\core\Seeder;
use app\models\products\Category;

/**
 * Insert records into categories table
 */
class m_1689342747_seed_categories_table extends Seeder
{
	protected function table(): string
	{
		return Category::tableName();
	}

	protected function model(): string
	{
		return Category::class;
	}

	private function data_array(): array
	{
		return [
			['name' => 'water', 'description' =>  'Stay hydrated with our pristine and refreshing selection of still and sparkling waters, quenching your thirst with pure bliss.'],
			['name' => 'soda', 'description' =>  "Revel in the symphony of fizzy delight with our wide range of soft drinks, offering a multitude of flavors to satisfy every craving."],
			['name' => 'juice', 'description' =>  'Immerse yourself in the goodness of nature with our invigorating assortment of freshly squeezed juices, bursting with vibrant flavors and nourishment.'],
			['name' => 'coffee', 'description' =>  'Embark on a journey through the world of coffee with our expertly brewed blends, captivating your senses with every sip of liquid gold.'],
			['name' => 'tea', 'description' =>  'Unwind and indulge in the art of tea, where tranquility meets tantalising flavours. Sip serenity, one cup at a time.'],
			['name' => 'milk', 'description' =>  'Indulge in creamy perfection with our velvety milk-based delights, crafted to satisfy both traditionalists and those seeking alternative options.'],
			['name' => 'smoothie', 'description' =>  'Immerse yourself in a world of fruity ecstasy with our heavenly smoothies, blending the freshest ingredients to create a symphony of flavors.'],
			['name' => 'energy', 'description' =>  'Power up your day with our invigorating energy drinks, fuelling your spirit and providing the boost you need to conquer any challenge.'],
			['name' => 'beer', 'description' =>  'Experience the craft of brewing with our carefully curated selection of beers, from crisp lagers to bold ales, satisfying beer enthusiasts and adventurous palates alike.'],
			['name' => 'wine', 'description' =>  "Embark on a captivating journey through our cellar of wines, where you'll find an exceptional collection of reds, whites, and rosés to enhance any occasion."],
			['name' => 'liquor', 'description' =>  "Indulge in the allure of spirits with our meticulously chosen selection of liquors, offering the perfect companion for those seeking refined indulgence."],
			['name' => 'cocktail', 'description' =>  "Immerse yourself in a world of mixology with our tantalizing cocktails, expertly crafted to dazzle your taste buds and transport you to new dimensions of flavor."],
			['name' => 'mocktail', 'description' =>  "Experience the enchantment of alcohol-free mixology with our delightful mocktails, combining exquisite flavors and artful presentation for a captivating experience."],
			['name' => 'chocolate', 'description' =>  "Succumb to the allure of chocolate with our decadent creations, showcasing the finest cacao and indulging your sweetest desires."],
			['name' => 'ice cream', 'description' =>  "Delight in a paradise of frozen delight with our luscious ice cream creations, offering a tantalizing array of flavors to cool you down and satisfy your cravings."],
			['name' => 'yoghurt', 'description' =>  "Delight in the creamy goodness of our yogurt-based drinks, offering a refreshing and wholesome option for a satisfying treat."],
		];
	}

	public function up()
	{
		foreach ($this->data_array() as $category) {
			$categoryData = $this->data();
			foreach ($category as $property => $value) {
				$categoryData->set($property, $value);
			}
			$categoryData->set('image', '');
			$this->add($categoryData);
		}

		$this->seed();
	}
}
