<?php

namespace Database\Factories;

use App\Enums\ImageCollectionEnum;
use App\Models\Slide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slide>
 */
class SlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $buttonActivity = $this->faker->boolean();

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(2),
            'button_activity' => $buttonActivity,
            'button_text' => $buttonActivity ? $this->faker->sentence(3) : null,
            'button_link' => $buttonActivity ? $this->faker->url() : null,
        ];
    }

    /**
     * Attach image into a slide
     */
    public function configure(): SlideFactory
    {
        return $this->afterCreating(function (Slide $slide) {
            $slide->addMediaConversion('thumb')
                ->width(368)
                ->height(232)
                ->performOnCollections(ImageCollectionEnum::COVER->value);
        });
    }
}
