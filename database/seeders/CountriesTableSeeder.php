<?php

namespace Database\Seeders;

use App\Models\Countries;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $countries = [
            ['name'=>'Япония'],
            ['name'=>'Китай'],
            ['name'=>'Корея'],
            ['name'=>'Россия'],
            ['name'=>'США'],
            ['name'=>'Франция'],
        ];
        foreach ($countries as $country){
            Countries::insert($country);
        }
    }
}
