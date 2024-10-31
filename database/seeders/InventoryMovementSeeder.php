<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InventoryMovement;
use App\Models\Product;
use Faker\Factory as Faker;

class InventoryMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Product::all()->each(function ($product) use ($faker) {
            foreach (range(1, 3) as $index) {
                InventoryMovement::create([
                    'product_id' => $product->id,
                    'type' => $faker->randomElement(['entry', 'exit']),
                    'quantity' => $faker->numberBetween(1, 100),
                    'movement_date' => $faker->dateTimeThisYear()->format('Y-m-d'),
                    'description' => $faker->sentence,
                ]);
            }
        });
    }
}
