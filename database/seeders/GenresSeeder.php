<?php

namespace Database\Seeders;

use App\Models\Genres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $genres = [
            ['name'=>'Экшн'],['name'=>'Фэнтези'],['name'=>'Романтика'],['name'=>'Драма'],['name'=>'Комедия'],['name'=>'Ужасы'],['name'=>'Фантастика'],
            ['name'=>'Приключения'],['name'=>'Детские'],['name'=>'Повседневность'],['name'=>'Исэкай'],['name'=>'Сёнэн'],
            ['name'=>'Сёдзе'],['name'=>'Меха'],['name'=>'Этти'],['name'=>'Боевые искусства'],['name'=>'Игры'],['name'=>'Спорт'],['name'=>'Школа'],
        ];
        foreach ($genres as $genre){
            Genres::insert($genre);
        }
    }
}
