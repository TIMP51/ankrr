<?php

namespace Database\Seeders;

use App\Models\AnimationsCountries;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimationCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $animationCountries =
            [
                [
                    'country_id'=>'1',
                    'animation_id'=>'1',
                ],
                [
                    'country_id'=>'2',
                    'animation_id'=>'2',
                ],
                [
                    'country_id'=>'2',
                    'animation_id'=>'3',
                ],
                [
                    'country_id'=>'2',
                    'animation_id'=>'4',
                ],
                [
                    'country_id'=>'3',
                    'animation_id'=>'5',
                ],
                [
                    'country_id'=>'4',
                    'animation_id'=>'6',
                ],
                [
                    'country_id'=>'1',
                    'animation_id'=>'6',
                ],
                [
                    'country_id'=>'1',
                    'animation_id'=>'7',
                ],
                [
                    'country_id'=>'1',
                    'animation_id'=>'8',
                ],
                [
                    'country_id'=>'4',
                    'animation_id'=>'9',
                ],
                [
                    'country_id'=>'3',
                    'animation_id'=>'10',
                ],
                [
                    'country_id'=>'5',
                    'animation_id'=>'11',
                ],
                [
                    'country_id'=>'5',
                    'animation_id'=>'12',
                ],
                [
                    'country_id'=>'4',
                    'animation_id'=>'13',
                ],
                [
                    'country_id'=>'3',
                    'animation_id'=>'14',
                ],
                [
                    'country_id'=>'5',
                    'animation_id'=>'15',
                ],
                [
                    'country_id'=>'2',
                    'animation_id'=>'16',
                ],
                [
                    'country_id'=>'1',
                    'animation_id'=>'17',
                ],
                [
                    'country_id'=>'2',
                    'animation_id'=>'18',
                ],
                [
                    'country_id'=>'1',
                    'animation_id'=>'19',
                ],
                [
                    'country_id'=>'3',
                    'animation_id'=>'20',
                ],
                [
                    'country_id'=>'1',
                    'animation_id'=>'21',
                ],
            ];
        foreach ($animationCountries as $animationCountry){
            AnimationsCountries::insert($animationCountry);
        }
    }
}
