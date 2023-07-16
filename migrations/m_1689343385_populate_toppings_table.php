<?php

use app\core\Seeder;
use app\models\products\Topping;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1689343385_populate_toppings_table extends Seeder
{
	protected function table(): string
	{
		return Topping::tableName();
	}

	public function up()
	{
		$this->add(
			$this->data()->name('Whipped Cream')->description('Indulge in the velvety pleasure of whipped cream, adding a heavenly cloud of sweetness to your drinks.')->price(250),
			$this->data()->name('Sprinkles')->description('Sprinkle joy and color with our delightful assortment of sprinkles, creating a playful and whimsical touch to your beverages.')->price(150),
			$this->data()->name('Chocolate Shavings')->description('Experience pure chocolate bliss with our delectable chocolate shavings, enhancing your drink with rich and irresistible cocoa flavors.')->price(150),
			$this->data()->name('Cinnamon/Nutmeg')->description('Infuse your beverage with warm and comforting spices, cinnamon or nutmeg, providing a cozy and aromatic twist to your sips.')->price(200),
			$this->data()->name('Marshmallows')->description('Float on a fluffy cloud of delight with our marshmallow fluff, adding a soft and sweet texture to your drinks.')->price(300),
			$this->data()->name('Caramel Drizzle')->description('Drizzle your beverage with luscious caramel, creating a decadent swirl of sweetness that elevates every sip.')->price(300),
			$this->data()->name('Fruit')->description('Enjoy a burst of natural freshness with our vibrant fruit slices, adding a refreshing and juicy touch to your drink.')->price(300),
			$this->data()->name('Boba/Tapioca Pearls')->description('Dive into a fun and chewy adventure with our bouncy boba/tapioca pearls, infusing your drink with delightful bursts of texture.')->price(500),
			$this->data()->name('Mint')->description('Refresh your senses with the invigorating essence of fresh mint leaves, adding a cool and revitalizing element to your beverage.')->price(350),
			$this->data()->name('Citrus Zest')->description('Awaken your taste buds with a zesty pop of citrus zest, bringing a vibrant and tangy twist to your drinks.')->price(300),
			$this->data()->name('Chopped Nuts')->description('Experience a satisfying crunch with our chopped nuts, adding a delightful and textured surprise to your beverage.')->price(300),
			$this->data()->name('Edible Flowers')->description('Delight in the beauty of nature with our edible flower blossoms, adding a touch of elegance and subtle floral notes to your drink.')->price(500),
			$this->data()->name('Chocolate Syrup')->description('Indulge your sweet tooth with a decadent chocolate syrup drizzle, creating a velvety cascade of rich cocoa flavors in your beverage.')->price(300),
			$this->data()->name('Caramelized Sugar')->description('Sprinkle your drink with caramelized sugar, infusing it with a delightful caramel essence and a subtle hint of sweetness.')->price(300),
			$this->data()->name('Honey')->description('Description: Experience the golden touch of natural sweetness with our luscious honey, adding a smooth and delightful flavor to your sips')->price(200),
			$this->data()->name('Cookie Crumbs')->description('Crumble our complimentary cookies into your drink, enjoying a delightful blend of textures and flavors that make every sip a treat.')->price(700),
			$this->data()->name('Coconut Flakes')->description('Transport yourself to paradise with our tropical coconut flakes, infusing your beverage with a delightful hint of exotic and creamy goodness.')->price(400),
			$this->data()->name('Coffee Beans')->description('Add a sophisticated touch to your drink with our aromatic coffee beans, lending a rich and fragrant essence to your sips.')->price(450),
			$this->data()->name('Chocolate Chips')->description('Delight in bursts of chocolate indulgence with our scrumptious chocolate chips, creating pockets of sweet delight in your beverage.')->price(500),
			$this->data()->name('Colored Sugar Crystals')->description('Sprinkle your drink with shimmering sugar crystals, bringing a touch of sparkle and a hint of sweetness to your sips.')->price(500)
		);

		$this->seed();
	}
}
