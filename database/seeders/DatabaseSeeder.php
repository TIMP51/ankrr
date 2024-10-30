<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categories;
use App\Models\Countries;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountriesTableSeeder::class,
            UserSeeder::class,
            GenresSeeder::class,
            TypesSeeder::class,
            StudiosSeeder::class,
            CaregoriesSeeder::class,
            AnimationSeeder::class,
            AnimationsGenresSeeder::class,
            AnimationCountriesSeeder::class,
            ActorsSeeder::class,
            HeroesSeeder::class,
            EpisodesSeeder::class,
        ]);

//         \App\Models\User::factory(1)->create();
//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
//         Countries::factory(1)->create();
    }
}
