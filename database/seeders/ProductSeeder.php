<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public const DEFAULT_CURRENCY = 'VNĐ';

    public $products = [
        [
            'id' => 1,
            'category_id' => 1,
            'name' => 'Cappuchino',
            'description' => 'Cappuccino is a coffee drink...',
            'price' => 35000,
            'display_image_url' => Product::DEFAULT_IMAGE,
        ],
        [
            'id' => 2,
            'category_id' => 2,
            'name' => 'Chicken satay salad',
            'description' => 'Marinate chicken breasts...',
            'price' => 50000,
            'display_image_url' => Product::DEFAULT_IMAGE,
        ],
    ];

    private function getProducts()
    {
        return collect($this->products);
    }

    // public function run(): void
    // {
    //     foreach ($this->getProducts() as $product) {
    //         $product['currency'] = self::DEFAULT_CURRENCY;
    //         Product::create($product);
    //     }
    // }

    public function run(): void
    {
        Product::factory()->count(100)->create();
    }
}
