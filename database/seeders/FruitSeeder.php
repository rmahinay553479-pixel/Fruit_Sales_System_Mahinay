<?php

namespace Database\Seeders;

use App\Models\Fruit;
use Illuminate\Database\Seeder;

class FruitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fruits = [
            [
                'name' => 'Mango',
                'category' => 'Tropical',
                'price_per_kg' => 120.00,
                'stock_quantity' => 50,
                'description' => 'Fresh and sweet mangoes from the Philippines',
                'availability' => true,
            ],
            [
                'name' => 'Banana',
                'category' => 'Tropical',
                'price_per_kg' => 45.00,
                'stock_quantity' => 100,
                'description' => 'Golden ripe bananas, perfect for daily consumption',
                'availability' => true,
            ],
            [
                'name' => 'Orange',
                'category' => 'Citrus',
                'price_per_kg' => 80.00,
                'stock_quantity' => 60,
                'description' => 'Juicy citrus oranges with high vitamin C content',
                'availability' => true,
            ],
            [
                'name' => 'Lemon',
                'category' => 'Citrus',
                'price_per_kg' => 90.00,
                'stock_quantity' => 40,
                'description' => 'Sour and refreshing lemons for cooking and beverages',
                'availability' => true,
            ],
            [
                'name' => 'Strawberry',
                'category' => 'Berry',
                'price_per_kg' => 250.00,
                'stock_quantity' => 20,
                'description' => 'Fresh red strawberries, perfect for desserts',
                'availability' => true,
            ],
            [
                'name' => 'Blueberry',
                'category' => 'Berry',
                'price_per_kg' => 280.00,
                'stock_quantity' => 15,
                'description' => 'Antioxidant-rich blueberries for health benefits',
                'availability' => false,
            ],
            [
                'name' => 'Apple',
                'category' => 'Apples',
                'price_per_kg' => 110.00,
                'stock_quantity' => 70,
                'description' => 'Crispy red apples, ideal for snacking and baking',
                'availability' => true,
            ],
            [
                'name' => 'Pear',
                'category' => 'Pears',
                'price_per_kg' => 130.00,
                'stock_quantity' => 35,
                'description' => 'Sweet and juicy pears, great for fresh consumption',
                'availability' => true,
            ],
            [
                'name' => 'Watermelon',
                'category' => 'Melons',
                'price_per_kg' => 35.00,
                'stock_quantity' => 80,
                'description' => 'Refreshing watermelon, perfect for hot summers',
                'availability' => true,
            ],
            [
                'name' => 'Cantaloupe',
                'category' => 'Melons',
                'price_per_kg' => 80.00,
                'stock_quantity' => 25,
                'description' => 'Sweet and aromatic cantaloupe melon',
                'availability' => true,
            ],
            [
                'name' => 'Grape',
                'category' => 'Grapes',
                'price_per_kg' => 200.00,
                'stock_quantity' => 30,
                'description' => 'Fresh seedless grapes, sweet and juicy',
                'availability' => true,
            ],
            [
                'name' => 'Peach',
                'category' => 'Stone Fruit',
                'price_per_kg' => 140.00,
                'stock_quantity' => 0,
                'description' => 'Soft and juicy peaches for summer fruits',
                'availability' => false,
            ],
        ];

        foreach ($fruits as $fruit) {
            Fruit::create($fruit);
        }
    }
}
