<?php
namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(), // Nombre aleatorio del producto
            'sku' => Str::upper($this->faker->unique()->lexify('SKU-????')), // SKU único
            'expiry_date' => $this->faker->dateTimeBetween('+1 week', '+1 year'), // Fecha de caducidad aleatoria
        ];
    }
}
