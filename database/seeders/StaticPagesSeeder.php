<?php

namespace Database\Seeders;

use App\Enums\ImageCollectionEnum;
use App\Enums\PageTypesEnum;
use App\Models\StaticPage;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class StaticPagesSeeder extends Seeder
{
    public function __construct(private readonly Factory $faker) {}

    /**
     * Run the database seeds.
     *
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function run(): void
    {
        $this->mainPage();
        $this->contactPage();
    }

    /**
     * Create a main page
     *
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    private function mainPage(): void
    {
        $page = StaticPage::create([
            'type' => PageTypesEnum::HOME,
            'title' => config('app.name'),
            'description' => $this->faker->create()->sentence(10),
            'attributes' => [
                'about_title' => $this->faker->create()->sentence(3),
                'about_description' => $this->faker->create()->paragraph(10),
                'services_title' => $this->faker->create()->sentence(3),
                'services_description' => $this->faker->create()->paragraph(10),
                'final_title' => $this->faker->create()->sentence(3),
                'final_description' => $this->faker->create()->paragraph(10),
                'final_button_status' => true,
                'final_button_text' => $this->faker->create()->sentence(1),
                'final_button_link' => $this->faker->create()->url(),
            ],
            'template' => 'granit.home',
        ]);

        $page->addMediaFromDisk('service_placeholder.jpg', 'vcs')
            ->preservingOriginal()
            ->toMediaCollection(ImageCollectionEnum::MAIN_PAGE_ABOUT->value);

        $page->addMediaFromDisk('service_placeholder.jpg', 'vcs')
            ->preservingOriginal()
            ->toMediaCollection(ImageCollectionEnum::MAIN_PAGE_FINAL->value);
    }

    /**
     * Create a contact page
     */
    private function contactPage(): void
    {
        StaticPage::create([
            'type' => PageTypesEnum::OTHER,
            'title' => 'Contacts',
            'description' => $this->faker->create()->sentence(10),
            'attributes' => [],
            'template' => 'granit.contacts',
        ]);
    }
}
