<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
 [
	[
	'name'		=>	'GFS Three Pepper Salsa',	
	'category'	=>	'Food',
	'price' 	=>	'40000',
	'description'	=>	'A blend of jalapeño, Anaheim and chipotle peppers, it delivers back-of-the house quality and authentic flavor with a medium-spicy kick to the table.',
	'avatar'	=>	'722911-GFS-Three-Pepper-Salsa-pp.jpg',
	],

	[
	'name'		=>	'GFS Cheese Grits',
	'category'	=>	'Food',
	'price' 	=>	'50000',
	'description'	=>	'Industry research shows that new riffs on Southern-style cuisine offer big opportunities. Authentic ingredients—especially grits—are critical to satisfying cravings for Southern cuisine. Traditionally a slow-cooked, thick porridge made from ground, dried corn, grits have long been a Southern breakfast staple. Our Cheese Grits deliver big flavor with little work. They’re ready to serve or ready to reinvent according to capabilities or creativity.',
	'avatar'	=>	'680861-Cheesy_Grits-2pp.jpg',
	],

	[
	'name'		=>	'Seasoned Pork Loin Roasts',
	'category'	=>	'Food',
	'price' 	=>	'300000',
	'description'	=>	'Bathed in a proprietary brine and bag-cooked, our ready-to-use Seasoned Pork Loin is moist, tender and delivers rich flavor inspired by porchetta without all the fuss. Use it throughout your menus and across dayparts. You can’t go wrong, no matter how you serve it.',
	'avatar'	=>	'548771-GS-Seasoned-Pork-Loin-pp.jpg',
	],

	[
	'name'		=>	'Whole Pork Belly',
	'category'	=>	'Food',
	'price' 	=>	'200000',
	'description'	=>	'Today’s diners seek flavor, indulgence, variety and items they can’t or don’t care to prepare at home. Satisfy them with our Seasoned Pork Belly. Pre-cooked and infused with flavor from our proprietary sweet-salty rub, it crisps up beautifully on the outside and is meltingly tender on the inside. Utterly craveable, it lends itself to countless applications across dayparts and segments. Use pork belly any time you want to add a wallop of umami-rich flavor and render diners practically unable to resist.',
	'avatar'	=>	'738231-GFS-Pork-Belly-pp.jpg',
	],

	[
	'name'		=>	'Korean BBQ Sauce',
	'category'	=>	'Food',
	'price' 	=>	'400000',
	'description'	=>	'Our distinctive Korean BBQ Sauce offers exciting new global flavor in a popular format that customers can relate to. With its mid-level heat and rich glaze, this sauce is an easy and delicious way to bring the Far East closer to home.',
	'avatar'	=>	'632971-GS-Korean-BBQ-Sauce-pp.jpg',
	],

	[
	'name'		=>	'Smokehouse Rub Seasoning',
	'category'	=>	'Food',
	'price' 	=>	'20000',
	'description'	=>	'Striking the perfect balance between sweet and savory, with just a tiny kick of sassy spiciness, our Smokehouse Rub offers satisfying, well-rounded flavor. While designed specifically for pork, it pairs nicely nonetheless with other proteins and veggies too. Given rising beef prices, use this rub as one more way to make cost-effective pork more appealing—and anytime you want go-to BBQ flavor.',
	'avatar'	=>	'713151-TE-Smokehouse-Rub-pp.jpg',
	],
	[
	'name'		=>	'Mushroom & Swiss Ground Beef Patties',
	'category'	=>	'Food',
	'price' 	=>	'95000',
	'description'	=>	'Consumers are seeking more flavor, choice and diversity of ingredients and “better-for-you” options on all parts of the menu—including bread. Richly textured and slightly sweet, this bread incorporates on-trend sprouted grain that delivers superior nutrition and digestibility.',
	'avatar'	=>	'706171-GFS-Mush-Swiss-Stuff-Burger-pp.jpg',
	],
	
	[
	'name'		=>	'Honey Wheat Bread Loaves',
	'category'	=>	'Food',
	'price' 	=>	'95000',
	'description'	=>	'Consumers are seeking more flavor, choice and diversity of ingredients and “better-for-you” options on all parts of the menu—including bread. Richly textured and slightly sweet, this bread incorporates on-trend sprouted grain that delivers superior nutrition and digestibility.',
	'avatar'	=>	'719271-GFS-Honey-Wheat-Bread-pp2.jpg',
	],

	[
	'name'		=>	'Malted Barley Bread Loaves',
	'category'	=>	'Food',
	'price' 	=>	'13000',
	'description'	=>	'Good bread isn’t defined by wheat alone. Barley gives this wheat bread a bit of heft and satisfying chew, while malt adds richness, depth of flavor and appealing color.',
	'avatar'	=>	'751020-GFS-Malted-Barley-Bread-Loaves-pp2.jpg',
	],

	[
	'name'		=>	'Chicken Soup, with Kale & Quinoa',
	'category'	=>	'Food',
	'price' 	=>	'120000',
	'description'	=>	'In this hearty kale and quinoa chicken soup, comfort food gets a contemporary update. This is one flavorful chicken soup that’s as good for the body as the soul.',
	'avatar'	=>	'727802-GFS-Chicken-Kale-Quinoa-Soup-pp.jpg',
	],

	[
	'name'		=>	'Ancient Grain Oatmeal',
	'category'	=>	'Food',
	'price' 	=>	'300000',
	'description'	=>	'Satisfy diners seeking nutrient-dense ancient grains with our blend of steel-cut oats, amaranth, red quinoa, millet, bulgur wheat and freekeh that’s lightly seasoned with cane syrup, butter, salt and cinnamon.',
	'avatar'	=>	'680841-GFS-Ancient-Grain-Oatmeal-pp.jpg',
	],

	[
	'name'		=>	'Sun-Fry Sunflower Oil',
	'category'	=>	'Food',
	'price' 	=>	'90000',
	'description'	=>	'Satisfy consumer demand for foods that offer both indulgence and a health halo. With its unique blend of high oleic and mid-oleic sunflower oils, Sun-Fry answers the call. Ideal for deep-frying, sautéing and other applications, this versatile sunflower oil is a shining star that delivers superior quality, performance and flavor cost-effectively.',
	'avatar'	=>	'657281-Sun-Fry-Sunlflower-Oil-pp.jpg',
	],

	[
	'name'		=>	'Cold-Brew',
	'category'	=>	'Drink',
	'price' 	=>	'30000',
	'description'	=>	'Cold-brew coffee is the hottest trend across the beverage landscape. Brewed slowly with cold or room-temperature water, the result is a coffee product that’s rich and deep.',
	'avatar'	=>	'Product_Page_893361-Mosaic_Orig-Strong-Mocha-Vanilla.jpg',
	],

	[
	'name'		=>	'Maryland-Style Crab Cakes',
	'category'	=>	'Food',
	'price' 	=>	'60000',
	'description'	=>	'Satisfy seafood lovers cravings with our premium Maryland-style Crab Cakes. Exceptionally flavorful and loaded with colorful chunks of bell peppers, they deliver both the rich, buttery flavor and indulgence so many of today’s diners seek.',
	'avatar'	=>	'705001-705011-GS-Maryland-Style-Crab-Cakes-Dynamite-Sauce-pp.jpg',
	],

	[
	'name'		=>	'Sweet Potato Veggie Burgers',
	'category'	=>	'Food',
	'price' 	=>	'80000',
	'description'	=>	'With roasted sweet potato, wild rice, beans, red and white quinoa, cannellini beans, roasted portobello mushrooms, fresh carrots, caramelized onions, rolled oats, scallions and roasted garlic, this colorful burger adds roasted root vegetables and a comfort-food element to the veggie-burger experience.',
	'avatar'	=>	'620241-GS-Sweet-Potato-Veggie-Burger-pp.jpg',
	],

	[
	'name'		=>	'Mini Naan Bites',
	'category'	=>	'Food',
	'price' 	=>	'300000',
	'description'	=>	'Our Mini Naan Bites make it easy to menu this Indian flatbread as an appetizer. The hand-stretched dough is made with real buttermilk and ghee, then baked in a tandoor oven for authenticity. They are soft to the bite, but durable to stand up to hearty spreads and toppings.',
	'avatar'	=>	'746497-794757-GFS-Falafel-Mix-Naan-pp.jpg',
	],

	[
	'name'		=>	'Pepper Mill Blood Orange Vinaigrette Dressing',
	'category'	=>	'Food',
	'price' 	=>	'30000',
	'description'	=>	'Sour and bitter flavors are on-trend—especially with millennial diners—in everything from cocktails and beers to entrées and desserts. With its tart taste and intense color, this distinctive vinaigrette offers the variety and flavor diners crave.',
	'avatar'	=>	'738657-PM-Blood-Orange-Vinaigrette-pp.jpg',
	],

	[
	'name'		=>	'Pepper Mill Green Goddess Dressing',
	'category'	=>	'Food',
	'price' 	=>	'95000',
	'description'	=>	'Our luscious, herby Green Goddess dressing is a flavor-forward take on a retro classic. Creamy, but without the heaviness of mayonnaise-based dressings, it s light, fresh tarragon-infused flavor and health halo give it broad appeal.',
	'avatar'	=>	'705061-PM-Green-Goddess-pp.jpg',
	],

	[
	'name'		=>	'Pineapple Beet Veggie Burgers',
	'category'	=>	'Food',
	'price' 	=>	'40000',
	'description'	=>	'Hearty and delicious, this veggie burger boasts wild rice, beans, red and white quinoa, hummus, roasted red and yellow beets, roasted fresh pineapple, kale, rolled oats, caramelized onion, roasted garlic, honey and fresh ginger. ',
	'avatar'	=>	'620221-GS-Pineapple-Beet-Veggie-Burger-pp.jpg',
	],

	[
	'name'		=>	'Almond Rabdi Frappe',
	'category'	=>	'Drink',
	'price' 	=>	'40000',
	'description'	=>	'Classic Rabdi flavored smooth frappe, with a shot of whipped cream and crunchy almond flakes. Get the beach party started.',
	'avatar'	=>	'almond-rabdi.png',
	],
	
	[
	'name'		=>	'Cool Blue',
	'category'	=>	'Drink',
	'price' 	=>	'40000',
	'description'	=>	'Cool Blue, a syrupy blue blend skating on crushed ice! Zap away that summer heat and enjoy a tall glass of pure shock, as you plunge your mind into CCD s summer favourite! ',
	'avatar'	=>	'Cool-blue.jpg',
	],
	
	[
	'name'		=>	'Classic Lemonade',
	'category'	=>	'Drink',
	'price' 	=>	'30000',
	'description'	=>	'Get refreshed! Introducing a lemonade with a touch of mint and ginger that make for the perfect sip, when you are chillin.',
	'avatar'	=>	'Classic-Lemonade_0.jpg',
	],

	[
	'name'		=>	'Crunchy Frappe',
	'category'	=>	'Drink',
	'price' 	=>	'40000',
	'description'	=>	'Experience a rich chocolaty meltdown loaded with crunchy oreos in this CCD fan favourite drink! ',
	'avatar'	=>	'Crunchy-Frappe_0.jpg',
	],

	[
	'name'		=>	'Pomegranate',
	'category'	=>	'Drink',
	'price' 	=>	'40000',
	'description'	=>	'Enthuse yourself with purpose! A few sips of the arise will have you revived. Go ahead, sip away the blues with some dynamic reds.',
	'avatar'	=>	'7_836x663_pomegranate.jpg',
	],

	[
	'name'		=>	'Aztec Cappuccino',
	'category'	=>	'Drink',
	'price' 	=>	'50000',
	'description'	=>	'A delightful international gourment blend that includes a double shot of espresso brewed from a blend of imported coffee beans topped with steamed and foamed milk.',
	'avatar'	=>	'Aztec-Ethiopian_0.jpg',
	],

	[
	'name'		=>	'Cranberry Latte',
	'category'	=>	'Drink',
	'price' 	=>	'90000',
	'description'	=>	'Cranberry flavoured hot coffee, garnished with a cream swirl, drizzled with cocoa topping and dried cranberries. The magical ingredient.',
	'avatar'	=>	'Cranberry-Latte_1.png',
	],

	[
	'name'		=>	'Devil s Own',
	'category'	=>	'Drink',
	'price' 	=>	'90000',
	'description'	=>	'A sinful treat that will turn you over to the dark side. Get aquainted with this mix of Cafe Frappe loaded with chocolate and whipped cream!',
	'avatar'	=>	'Devils-Own_0.jpg',
	],

	[
	'name'		=>	'Creamy Toffee Frappe',
	'category'	=>	'Drink',
	'price' 	=>	'15000',
	'description'	=>	'Rich toffee sauce blended with Coffee frappe, topped with whipped cream, butterscotch . Just chill! ',
	'avatar'	=>	'cream-toffe.png',
	],

	[
	'name'		=>	'Enliven With Chamomile',
	'category'	=>	'Drink',
	'price' 	=>	'20000',
	'description'	=>	'The calm of chamomile and lemon oils will give you the inspiration you need to make the most of your day.',
	'avatar'	=>	'5_836x663_chamomile.jpg',
	],

	[
	'name'		=>	'Green Apple Soda',
	'category'	=>	'Drink',
	'price' 	=>	'90000',
	'description'	=>	'Cool down with this thirst quenching mix of the freshness of green apples with the fizz of soda.',
	'avatar'	=>	'Green-Apple_0.jpg',
	],

	[
	'name'		=>	'Inverted Cappuccino',
	'category'	=>	'Drink',
	'price' 	=>	'30000',
	'description'	=>	'Cappuccino turned made upside down with steamed milk and a coffee ring, topped with milk foam. Leaves you spellbound!',
	'avatar'	=>	'Inverted-Cappuccino.png',
	],



 ]
        
	);
    }
}
