<?php

namespace Database\Factories;

use App\Enums\ImageCollectionEnum;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        $description = $this->faker->paragraph(2);
        $defaultPrice = $this->faker->randomFloat(2, 0, 1000);

        return [
            'title' => $title,
            'description' => $description,
            'default_price' => $defaultPrice,
            'current_price' => rand(1, 100) >= 50 ? $defaultPrice / rand(2, 10) : null,
            'seo_title' => $title,
            'seo_description' => $description,
        ];
    }

    /**
     * Attach cover and banner
     */
    public function configure(): ServiceFactory
    {
        return $this->afterCreating(function (Service $service) {
            $service->addMediaFromDisk('service_placeholder.jpg', 'vcs')
                ->preservingOriginal()
                ->toMediaCollection(ImageCollectionEnum::COVER->value);

            $service->addMediaFromDisk('banner_placeholder.jpg', 'vcs')
                ->preservingOriginal()
                ->toMediaCollection(ImageCollectionEnum::BANNER->value);
        });
    }
}
