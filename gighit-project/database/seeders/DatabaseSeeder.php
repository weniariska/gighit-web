<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Drink;
use App\Models\Pizza;
use App\Models\Starter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'fullName' => 'Admin Gighit',
            'email' => 'admin_gighit@gmail.com',
            'address' => 'Jalan Gighit',
            'username' => 'iamGIGmin',
            'password' => Hash::make('@gigcret'),
            'userType' => 'admin'
        ]);

        // pizza
        Pizza::create([
            'name' => 'AI FUNGI',
            'image' => 'pizzas//aifungi.jpg',
            'price' => '90000',
            'desc' => 'fresh mushrooms with mozzarella cheese'
        ]);
        Pizza::create([
            'name' => 'BBQ CHICKEN',
            'image' => 'pizzas//bbqChicken.jpg',
            'price' => '80000',
            'desc' => 'chicken decked with red onion and tasty bbq sauce'
        ]);
        Pizza::create([
            'name' => 'CAPRICCIOSA',
            'image' => 'pizzas//capricciosa.jpg',
            'price' => '85000',
            'desc' => 'meat, egg slice, mushrooms in a cheese sauce base'
        ]);
        Pizza::create([
            'name' => 'FARMHOUSE',
            'image' => 'pizzas//farmhouse.jpg',
            'price' => '75000',
            'desc' => 'fresh mushrooms, tomato sauce, ham, mozzarella cheese'
        ]);
        Pizza::create([
            'name' => 'HAWAIIAN',
            'image' => 'pizzas//hawaiian.jpg',
            'price' => '100000',
            'desc' => 'cheese sauce base topped with meat and pepperoni'
        ]);
        Pizza::create([
            'name' => 'MARGHERITA',
            'image' => 'pizzas//margherita.jpg',
            'price' => '102000',
            'desc' => 'a tomato sauce base, mozzarella, tomato chunks, oreqano'
        ]);
        Pizza::create([
            'name' => 'MEAT LOVERS',
            'image' => 'pizzas//meatLovers.jpg',
            'price' => '105000',
            'desc' => 'pepperoni, spicy beef, ham and spicy pork on a tomato sauce base'
        ]);
        Pizza::create([
            'name' => 'PEPPERONI LOVERS',
            'image' => 'pizzas//pepperoniLovers.jpg',
            'price' => '80000',
            'desc' => 'a tomato sauce base topped with mozzarella cheese, chunks and ham'
        ]);
        Pizza::create([
            'name' => 'SUPREME',
            'image' => 'pizzas//supreme.jpg',
            'price' => '95000',
            'desc' => 'pepperoni, meat, mushrooms and mozzarella cheese'
        ]);

        //// DRINK
        Drink::create([
            'name' => 'GREEN TEA',
            'image' => 'drinks//greenTea.jpg',
            'price' => '18000',
            'desc' => 'with green tea and fresh milk'
        ]);
        Drink::create([
            'name' => 'ICE BOBA',
            'image' => 'drinks//iceBoba.jpg',
            'price' => '25000',
            'desc' => 'fresh ice topped with boba'
        ]);
        Drink::create([
            'name' => 'ICE MOCCA',
            'image' => 'drinks//iceMocca.jpg',
            'price' => '20000',
            'desc' => 'a tasty ice mocca'
        ]);
        Drink::create([
            'name' => 'LIME TEA',
            'image' => 'drinks//limeTea.jpg',
            'price' => '15000',
            'desc' => 'a fresh lime and tea'
        ]);
        Drink::create([
            'name' => 'OREO',
            'image' => 'drinks//oreo.jpg',
            'price' => '22000',
            'desc' => 'a tasty oreo with fresh pop ice'
        ]);
        Drink::create([
            'name' => 'OVALTINE',
            'image' => 'drinks//ovaltine.jpg',
            'price' => '23000',
            'desc' => 'sweet ovaltine and fresh milk'
        ]);
        Drink::create([
            'name' => 'TARO',
            'image' => 'drinks//taro.jpg',
            'price' => '20000',
            'desc' => 'sweet taro and fresh milk'
        ]);

        //// straters
        Starter::create([
            'name' => 'BREAD STICKS',
            'image' => 'starters//breadSticks.jpg',
            'price' => '18000',
            'desc' => 'tasty and crispy bread sticks'
        ]);
        Starter::create([
            'name' => 'CHICKEN STRIPS',
            'image' => 'starters//chickenStrips.jpg',
            'price' => '25000',
            'desc' => 'tasty chicken strips'
        ]);
        Starter::create([
            'name' => 'CHICKEN WRAP',
            'image' => 'starters//chickenWrap.jpg',
            'price' => '20000',
            'desc' => 'tortilla with spicy chicken slice'
        ]);
        Starter::create([
            'name' => 'GARLIC BREAD',
            'image' => 'starters//garlicBread.jpg',
            'price' => '15000',
            'desc' => 'tasty garlic bread'
        ]);
        Starter::create([
            'name' => 'MOZZA BREAD',
            'image' => 'starters//mozzaGarlicBread.jpg',
            'price' => '22000',
            'desc' => 'tasty garlic bread topped with mozzarella'
        ]);
        Starter::create([
            'name' => 'VEGETARIAN WRAP',
            'image' => 'starters//vegetarianWrap.jpg',
            'price' => '23000',
            'desc' => 'healthy and delicious vegetarian wrap'
        ]);
    }
}
