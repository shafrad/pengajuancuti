<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        if(DB::table('users')->get()->count() == 0){

            DB::table('users')->insert([

                [
                    'name' => 'Staff',
                    'email' => 'staff@email.com',
                    'password' => Hash::make('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Manager',
                    'email' => 'manager@email.com',
                    'password' => Hash::make('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Director',
                    'email' => 'director@email.com',
                    'password' => Hash::make('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOTHING to seed"; }

    }
}