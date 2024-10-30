<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaregoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories =
            [
                [
                    'name'=>'Категория G (Нет возрастных ограничений)',
                ],
                [
                    'name'=>'Категория PG (Рекомендуется присутствие родителей)',
                ],
                [
                    'name'=>'Категория PG13 (Детям до 13 лет просмотр не желателен)',
                ],
                [
                    'name'=>'Категория R (Лицам до 17 лет обязательно присутствие взрослого)',
                ],
                [
                    'name'=>'Категория NC-17 (Лицам до 18 лет просмотр запрещен)',
                ],

            ];
        foreach ($categories as $category){
            Categories::insert($category);
        }
    }
}
