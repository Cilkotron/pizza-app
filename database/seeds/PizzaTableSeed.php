<?php

use Illuminate\Database\Seeder;

class PizzaTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizza = new \App\Pizza([
            'imagePath' => 'images/pizza1.jpg',
            'title' => 'Vegie Pizza',
            'description' => 'Super healthy vegie pizza',
            'price' => '10',
            'category_id' => '1'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/pizza2.jpg',
            'title' => 'Pizza Capriciosa ',
            'description' => 'Good old familiar taste of Capriciosa',
            'price' => '12',
            'category_id' => '1'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/pizza3.jpg',
            'title' => 'Vegie Pizza',
            'description' => 'Super healthy vegie pizza',
            'price' => '10',
            'category_id' => '1'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/pizza4.jpg',
            'title' => 'Pizza Margarita',
            'description' => 'Light pizza, tommato & cheese',
            'price' => '9',
            'category_id' => '1'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/pizza5.jpg',
            'title' => 'Pizza with Eggs',
            'description' => 'Good old familiar taste',
            'price' => '12',
            'category_id' => '1'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/pizza6.jpg',
            'title' => 'Vegan Pizza',
            'description' => 'This is our experimental Pizza',
            'price' => '12',
            'category_id' => '1'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/pizza7.jpg',
            'title' => 'Vegie Pizza',
            'description' => 'Super healthy vegie pizza',
            'price' => '10',
            'category_id' => '1'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/pizza8.jpg',
            'title' => 'Pizza Carbonara',
            'description' => 'Bacon, garlic & egs',
            'price' => '12',
            'category_id' => '1'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/pizza9.jpg',
            'title' => 'Peperroni Pizza',
            'description' => 'Good old familiar taste of Capriciosa',
            'price' => '7.88',
            'category_id' => '1'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/pasta2.jpg',
            'title' => 'Pasta Carbonara',
            'description' => 'Bacon, garlic & eggs',
            'price' => '25.00',
            'category_id' => '2'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/pasta3.jpg',
            'title' => 'Spagetti Bolognese',
            'description' => 'Tomato, beef, spices',
            'price' => '20.00',
            'category_id' => '2'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/pasta5.jpg',
            'title' => 'Seafood Pasta',
            'description' => 'Mussels, shrimp, clamps, spices',
            'price' => '30.00',
            'category_id' => '2'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/dessert1.jpg',
            'title' => 'Chocolate Pancakes',
            'description' => 'Chocolate pancakes thick, tender, and fluffy!',
            'price' => '10.00',
            'category_id' => '3'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/dessert2.jpg',
            'title' => 'Fruit Pancakes',
            'description' => 'Light mixed fruit pancakes',
            'price' => '12.50',
            'category_id' => '3'

        ]);
        $pizza->save();

        $pizza = new \App\Pizza([
            'imagePath' => 'images/dessert3.jpg',
            'title' => 'Cupcakes',
            'description' => 'Let them eat cake!',
            'price' => '15.45',
            'category_id' => '3'

        ]);
        $pizza->save();

    }
}
