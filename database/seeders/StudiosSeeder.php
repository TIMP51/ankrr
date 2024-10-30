<?php

namespace Database\Seeders;

use App\Models\Studios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $studios =
        [
            [
                'name'=>'A-1 Pictures Inc',
                'country_id'=>'1',
            ],
            [
                'name'=>'Pixar',
                'country_id'=>'5',
            ],
            [
                'name'=>'Союзмультфильм',
                'country_id'=>'4',
            ],
            [
                'name'=>'DreamWorks Animation',
                'country_id'=>'5'
            ],
            [
                'name'=>'Мульт.ру',
                'country_id'=>'4'
            ],
            [
                'name'=>'Мельница ',
                'country_id'=>'4'
            ],
        ];
        foreach ($studios as $studio){
            Studios::insert($studio);
        }
    }
}
