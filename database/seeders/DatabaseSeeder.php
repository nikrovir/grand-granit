<?php

namespace Database\Seeders;

use App\Models\Advantage;
use App\Models\Gallery;
use App\Models\Service;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Slide;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            UsersSeeder::class,
            StaticPagesSeeder::class,
        ]);

        Service::factory(10)->create();
        Gallery::factory(10)->create();
        Slide::factory(10)->create();
        Advantage::factory(5)->create();
    }
}
