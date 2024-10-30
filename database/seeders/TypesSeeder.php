<?php

namespace Database\Seeders;

use App\Models\Types;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types =
        [
            [
                'name'=>'Сериалы',

            ],
            [
                'name'=>'Полнометражные',

            ],
            [
                'name'=>'Короткометражные',

            ],

        ];
        foreach ($types as $type){
            Types::insert($type);
        }
    }
}
