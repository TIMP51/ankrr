<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name'=>'Admin',
                'email'=>'admin@admin',
                'password'=>Hash::make('adminadmin'),
                'role'=>'admin'

            ]
        ];
        foreach ($users as $user){
            User::insert($user);
        }
    }
}
