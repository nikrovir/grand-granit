<?php

namespace Database\Factories;

use App\Enums\ImageCollectionEnum;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
        ];
    }

    /**
     * Attach image into a gallery
     */
    public function configure(): GalleryFactory
    {
        return $this->afterCreating(function (Gallery $gallery) {
            for ($i = 0; $i < rand(5, 15); $i++) {
                $gallery->addMediaFromDisk('gallery_placeholder.webp', 'vcs')
                    ->preservingOriginal()
                    ->toMediaCollection(ImageCollectionEnum::GALLERY->value);
            }
        });
    }
}
