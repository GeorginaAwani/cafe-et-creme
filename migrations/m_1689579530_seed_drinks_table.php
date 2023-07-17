<?php

use app\core\Seeder;
use app\models\products\Drink;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1689579530_seed_drinks_table extends Seeder
{
	protected function table(): string
	{
		return Drink::tableName();
	}

	protected function model(): string
	{
		return Drink::class;
	}

	private function data_array(): array
	{
		return [
			1 => [
				[
					'name' => "Still Water",
					'description' => "Pure and refreshing hydration to quench your thirst and keep you revitalized.",
					'price' => 150,
				],
				[
					'name' => "Sparkling Water",
					'description' => "Effervescent bubbles dance on your tongue, adding a delightful fizz to your drinking experience.",
					'price' => 250,
				],
				[
					'name' => "Mineral Water",
					'description' => "Naturally sourced with essential minerals, offering a crisp and invigorating sip of nature's goodness",
					'price' => 300,
				],
				[
					'name' => "Berry Flavoured Water",
					'description' => "A hint of natural fruit essence infused in every sip, transforming water into a burst of refreshing flavor.",
					'price' => 450,
				],
				[
					'name' => "Lemon Flavoured Water",
					'description' => "A hint of natural fruit essence infused in every sip, transforming water into a burst of refreshing flavor.",
					'price' => 450,
				],
				[
					'name' => "Electrolyte Water",
					'description' => "Replenish and hydrate with electrolytes, restoring your body's balance and providing a revitalizing boost.",
					'price' => 550,
				],
			],

			2 => [
				[
					'name' => "Cola",
					'description' => "Classic and effervescent, the perfect balance of sweetness and fizz that never fails to satisfy.",
					'price' => 300,
				],
				[
					'name' => "Lemon-Lime Soda",
					'description' => "A tangy and citrusy delight that refreshes and invigorates your taste buds.",
					'price' => 300,
				],
				[
					'name' => "Ginger Ale",
					'description' => "A soothing and spicy blend that tickles your senses, offering a refreshing and calming experience.",
					'price' => 350,
				],
				[
					'name' => "Orange Soda",
					'description' => "Bursting with the zesty goodness of oranges, it's a vibrant and fruity soda for pure enjoyment.",
					'price' => 300,
				],
				[
					'name' => "Root Beer",
					'description' => " A rich and creamy indulgence with hints of sassafras and other botanical flavors, evoking nostalgia with every sip.",
					'price' => 500,
				],
			],

			3 => [
				[
					'name' => "Orange Juice",
					'description' => "Sunshine in a glass, with a zesty and tangy taste that's packed with vitamin C and natural refreshment.",
					'price' => 500,
				],
				[
					'name' => "Apple Juice",
					'description' => "The crisp and sweet essence of freshly picked apples, offering a wholesome and fruity drink for all ages.",
					'price' => 500,
				],
				[
					'name' => "Pineapple Juice",
					'description' => "Tropical paradise in a sip, delivering the exotic and refreshing flavor of ripe pineapples.",
					'price' => 500,
				],
				[
					'name' => "Cranberry Juice",
					'description' => "A tart and tangy sensation that awakens your palate, known for its vibrant color and antioxidant properties.",
					'price' => 500,
				],
				[
					'name' => "Grapefruit Juice",
					'description' => "A burst of bittersweet goodness, this invigorating juice delivers a zing of citrusy delight to your senses.",
					'price' => 500,
				],
			],

			4 => [
				[
					'name' => "Espresso",
					'description' => "Intense and concentrated, a bold shot of pure coffee that awakens the senses and fuels your day.",
					'price' => 500,
				],
				[
					'name' => "Cappuccino",
					'description' => "A harmonious blend of rich espresso, velvety steamed milk, and a delicate frothy topping, creating a comforting and indulgent coffee experience.",
					'price' => 650,
				],
				[
					'name' => "Latte",
					'description' => "Smooth and creamy, a perfect balance of espresso and steamed milk, offering a mellow and satisfying coffee delight.",
					'price' => 700,
				],
				[
					'name' => "Americano",
					'description' => "A strong and invigorating coffee experience, created by combining shots of espresso with hot water for a bolder flavor.",
					'price' => 500,
				],
				[
					'name' => "Mocha",
					'description' => "A decadent fusion of espresso, chocolate, and steamed milk, marrying the rich and aromatic notes of coffee with luscious chocolate indulgence.",
					'price' => 800,
				],
			],

			5 => [
				[
					'name' => "Earl Grey",
					'description' => "A sophisticated blend of black tea infused with the fragrant essence of bergamot, offering a timeless and aromatic cuppa.",
					'price' => 900,
				],
				[
					'name' => "Green Tea",
					'description' => "A gentle and invigorating brew, renowned for its delicate flavors and abundant health benefits.",
					'price' => 600,
				],
				[
					'name' => "Chamomile",
					'description' => "A soothing herbal infusion, cherished for its calming properties and delicate floral notes.",
					'price' => 800,
				],
				[
					'name' => "Peppermint",
					'description' => "A refreshing and invigorating minty brew, offering a cooling sensation and a soothing sip.",
					'price' => 700,
				],
				[
					'name' => "Chai",
					'description' => "An aromatic and spiced tea, combining black tea with a blend of warm spices for a flavorful and comforting experience.",
					'price' => 900,
				],
			],

			6 => [
				[
					'name' => "Whole Milk",
					'description' => "Creamy and wholesome, this classic milk provides a rich and satisfying taste.",
					'price' => 1100,
				],
				[
					'name' => "Skim Milk",
					'description' => "Light and refreshing, enjoy the goodness of milk with reduced fat content for a lighter option.",
					'price' => 1300,
				],
				[
					'name' => "Chocolate Milk",
					'description' => "Creamy and indulgent, a velvety treat that combines the goodness of milk with the irresistible flavor of chocolate.",
					'price' => 1200,
				],
				[
					'name' => "Almond Milk",
					'description' => "A nutty and dairy-free alternative, offering a subtly sweet taste and a creamy texture for those with dietary preferences.",
					'price' => 1500,
				],
				[
					'name' => "Soy Milk",
					'description' => "A plant-based milk option, silky and versatile, providing a smooth and nutritious alternative for those with dietary needs.",
					'price' => 1500,
				],
			],

			7 => [
				[
					'name' => "Strawberry Banana Smoothie",
					'description' => "A refreshing blend of luscious strawberries and creamy bananas, delivering a fruity and creamy treat.",
					'price' => 1000,
				],
				[
					'name' => "Mango Pineapple Smoothie",
					'description' => "Tropical paradise in a glass, with the vibrant flavors of ripe mangoes and tangy pineapples.",
					'price' => 1000,
				],
				[
					'name' => "Blueberry Acai Smoothie",
					'description' => "A burst of antioxidant-rich goodness, combining the vibrant flavors of blueberries and acai berries for a healthful delight.",
					'price' => 1100,
				],
				[
					'name' => "Green Detox Smoothie",
					'description' => "Packed with leafy greens and refreshing fruits, this invigorating blend offers a revitalizing and nutrient-rich experience.",
					'price' => 1300,
				],
				[
					'name' => "Mixed Berry Smoothie",
					'description' => "A medley of juicy berries, combining strawberries, raspberries, and blueberries for a vibrant and flavorful delight.",
					'price' => 1200,
				],
			],

			8 => [
				[
					'name' => "Classic Energy Drink",
					'description' => "Unleash your energy with this invigorating blend, providing a boost to power through your day.",
					'price' => 800,
				],
				[
					'name' => "Sugar-Free Energy Drink",
					'description' => "Get a burst of vitality without the sugar rush, offering a refreshing and guilt-free energy boost.",
					'price' => 1500,
				],
				[
					'name' => "Berry Blast Energy Drink",
					'description' => " A fruity fusion that combines the power of energy with the luscious flavors of berries, invigorating your senses.",
					'price' => 900,
				],
				[
					'name' => "Citrus Burst Energy Drink",
					'description' => "Tangy and zesty, this energizing drink delivers a refreshing citrus kick to keep you going strong.",
					'price' => 900,
				],
				[
					'name' => "Tropical Punch Energy Drink",
					'description' => "Transport yourself to a tropical oasis with this energizing blend of exotic fruits, providing a refreshing and revitalizing boost.",
					'price' => 900,
				],
			],

			9 => [
				[
					'name' => "Lager",
					'description' => "Crisp and golden, this classic beer style offers a smooth and refreshing taste with a light hop character.",
					'price' => 750,
					'is_alcoholic' => true
				],
				[
					'name' => "Pale Ale",
					'description' => "A balanced and flavorful beer with a hop-forward profile, delivering a refreshing and citrusy taste.",
					'price' => 800,
					'is_alcoholic' => true
				],
				[
					'name' => "Wheat Beer",
					'description' => "Light and refreshing, wheat beer offers a crisp and slightly fruity taste, perfect for warm weather enjoyment.",
					'price' => 800,
					'is_alcoholic' => true
				],
				[
					'name' => "India Pale Ale",
					'description' => "Hop lovers rejoice with this bold and hoppy beer style, known for its intense flavors and aromatic qualities.",
					'price' => 900,
					'is_alcoholic' => true
				],
				[
					'name' => "Stout",
					'description' => "Dark and velvety, this robust beer style boasts rich flavors of roasted malt, chocolate, and coffee for a truly indulgent experience.",
					'price' => 600,
					'is_alcoholic' => true
				],
			],

			10 => [
				[
					'name' => "Red wine",
					'description' => "A robust and full-bodied red wine with deep flavors of black fruit and a hint of oak, perfect for red wine enthusiasts.",
					'price' => 4500,
					'is_alcoholic' => true
				],
				[
					'name' => "White Wine",
					'description' => "A smooth and buttery white wine with notes of tropical fruit and vanilla, offering a delightful balance of flavors.",
					'price' => 5200,
					'is_alcoholic' => true
				],
				[
					'name' => "Rosé Wine",
					'description' => "Light and refreshing, this blush-colored wine presents a medley of delicate fruit flavors, creating a versatile and enjoyable experience.",
					'price' => 5500,
					'is_alcoholic' => true
				],
				[
					'name' => "Sparkling Wine",
					'description' => "Effervescent and celebratory, sparkling wine delights with its lively bubbles and crisp, festive character.",
					'price' => 6000,
					'is_alcoholic' => true
				],
				[
					'name' => "Sauvignon Blanc",
					'description' => "Crisp and vibrant, this white wine showcases refreshing citrus and herbaceous notes, ideal for those seeking a lively and zesty taste.",
					'price' => 6000,
					'is_alcoholic' => true
				],
			],

			11 => [
				[
					'name' => "Vodka",
					'description' => "A versatile and neutral spirit that serves as a building block for a wide range of cocktails, offering a smooth and clean taste",
					'price' => 6000,
					'is_alcoholic' => true
				],
				[
					'name' => "Whiskey",
					'description' => "A rich and complex spirit aged to perfection, boasting distinctive flavors and aromas that captivate the senses.",
					'price' => 6600,
					'is_alcoholic' => true
				],
				[
					'name' => "Rum",
					'description' => "A tropical delight with hints of sweetness and warm spices, bringing a taste of the Caribbean to your glass.",
					'price' => 6500,
					'is_alcoholic' => true
				],
				[
					'name' => "Gin",
					'description' => "A fragrant and botanical spirit, with juniper berries as the primary flavor, lending a crisp and refreshing character to cocktails.",
					'price' => 5500,
					'is_alcoholic' => true
				],
				[
					'name' => "Tequila",
					'description' => "A spirited and lively liquor made from the blue agave plant, known for its vibrant flavors and versatility in crafting a variety of cocktails.",
					'price' => 4000,
					'is_alcoholic' => true
				],
			],

			12 => [
				[
					'name' => "Margarita",
					'description' => "A zesty and tangy classic cocktail featuring tequila, lime juice, and a hint of sweetness, transporting you to sandy beaches and sunny moments.",
					'price' => 2600,
					'is_alcoholic' => true
				],
				[
					'name' => "Mojito",
					'description' => "A refreshing and minty delight, blending rum, lime juice, and fresh mint leaves for a rejuvenating and invigorating sip.",
					'price' => 2800,
					'is_alcoholic' => true
				],
				[
					'name' => "Martini",
					'description' => "Timeless and sophisticated, a classic cocktail featuring vodka or gin, perfectly chilled and garnished for a refined and elegant drinking experience.",
					'price' => 2600,
					'is_alcoholic' => true
				],
				[
					'name' => "Cosmopolitan",
					'description' => "Chic and cosmopolitan, this vibrant cocktail combines vodka, cranberry juice, orange liqueur, and a splash of lime for a fruity and tangy sensation.",
					'price' => 3000,
					'is_alcoholic' => true
				],
				[
					'name' => "Old Fashioned",
					'description' => " A true classic, this cocktail embodies timeless elegance with bourbon, sugar, bitters, and a twist of citrus, delivering a smooth and flavorful experience.",
					'price' => 3300,
					'is_alcoholic' => true
				],
			],

			13 => [
				[
					'name' => "Virgin Piña Colada",
					'description' => "Tropical paradise in a glass, this non-alcoholic delight blends creamy coconut and pineapple for a refreshing and indulgent mocktail experience.",
					'price' => 2900,
				],
				[
					'name' => "Shirley Temple",
					'description' => "A delightful and nostalgic mocktail, combining ginger ale, grenadine, and a maraschino cherry garnish, creating a sweet and bubbly treat.",
					'price' => 3000,
				],
				[
					'name' => "Virgin Mojito",
					'description' => "Crisp and invigorating, this alcohol-free version of the beloved mojito combines lime, mint, and soda water for a revitalizing and minty sip.",
					'price' => 2600,
				],
				[
					'name' => "Cranberry Spitzer",
					'description' => "A vibrant and tangy mocktail, marrying cranberry juice, soda water, and a squeeze of fresh citrus for a zesty and thirst-quenching delight.",
					'price' => 2800,
				],
				[
					'name' => "Blueberry Mocktail",
					'description' => "A burst of fruity goodness, this mocktail blends blueberries, soda water, and a touch of sweetness, offering a refreshing and vibrant sip.",
					'price' => 2800,
				],
			],

			14 => [
				[
					'name' => "Hot Chocolate",
					'description' => "A comforting and velvety drink that warms the soul with rich, indulgent cocoa and a dollop of whipped cream on top.",
					'price' => 1000,
				],
				[
					'name' => "Chocolate Milkshake",
					'description' => "A thick and creamy delight that combines the richness of chocolate with the smoothness of ice cream, providing a luxurious and decadent treat.",
					'price' => 1300,
				],
				[
					'name' => "Chocolate Martini",
					'description' => "A sophisticated and indulgent cocktail that combines the elegance of a martini with the allure of chocolate, offering a sweet and boozy delight.",
					'price' => 2800,
					'is_alcoholic' => true
				],
				[
					'name' => "Chocolate Smoothie",
					'description' => "A healthy and delicious blend of chocolate, bananas, and a dash of yogurt, creating a guilt-free and chocolaty indulgence.",
					'price' => 1200,
				],
				[
					'name' => "Mocha Frappuccino",
					'description' => "The perfect blend of coffee and chocolate in a frosty treat, delivering a heavenly combination of flavors and a satisfying caffeine kick.",
					'price' => 1000,
				],
			],

			15 => [
				[
					'name' => "Vanilla Ice Cream Float",
					'description' => "Classic and timeless, this float combines creamy vanilla ice cream with cola for a fizzy and nostalgic treat.",
					'price' => 1900,
				],
				[
					'name' => "Chocolate Sundae",
					'description' => "Layers of velvety chocolate ice cream, decadent chocolate sauce, and a crown of whipped cream, creating a heavenly and indulgent dessert.",
					'price' => 3500,
				],
				[
					'name' => "Strawberry Milkshake",
					'description' => "A fruity and creamy delight, blending luscious strawberry ice cream with milk for a refreshing and irresistible shake.",
					'price' => 1500,
				],
				[
					'name' => "Mint Chocolate Chip Ice Cream",
					'description' => "Cool and refreshing, this ice cream boasts the refreshing taste of mint combined with the delightful crunch of chocolate chips.",
					'price' => 3000,
				],
				[
					'name' => "Cookies and Cream Milkshake",
					'description' => "A classic combination of cookies and cream, blending rich and creamy vanilla ice cream with chunks of chocolate cookies for a heavenly milkshake experience.",
					'price' => 2500,
				],
			],

			16 => [
				[
					'name' => "Fruit Yoghurt Smoothie",
					'description' => "A delightful blend of creamy yogurt and a medley of fresh fruits, offering a wholesome and refreshing smoothie experience.",
					'price' => 1400,
				],
				[
					'name' => "Strawberry Yoghurt Shake",
					'description' => "Creamy yogurt meets juicy strawberries in this luscious shake, delivering a harmonious balance of tangy sweetness and velvety texture.",
					'price' => 1600,
				],
				[
					'name' => "Blueberry Yoghurt Parfait",
					'description' => "Layers of creamy yogurt, luscious blueberries, and crunchy granola, creating a parfait that's as visually appealing as it is delicious.",
					'price' => 2000,
				],
				[
					'name' => "Vanilla Yoghurt with Fresh Berries",
					'description' => "Creamy vanilla yogurt paired with a mix of vibrant fresh berries, offering a delightful and nutritious combination.",
					'price' => 1500,
				],
				[
					'name' => "Mango Lassi with Yoghurt",
					'description' => "A tropical delight, blending creamy yogurt and ripe mangoes into a smooth and satisfying beverage, capturing the essence of exotic flavors.",
					'price' => 1600,
				],
			],
		];
	}

	public function up()
	{
		foreach ($this->data_array() as $category => $drinks) {
			foreach ($drinks as $drink) {
				var_dump($drink);
				$drinkData = $this->data();
				foreach ($drink as $property => $value) {
					$drinkData->set($property, $value);
				}
				$drinkData->set('image', '')->set('category', $category)->set('quantity_in_store', 100);

				$this->add($drinkData);
			}
		}

		$this->seed();
	}
}
