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
     *
     * @return void
     */
    public function run()
    {
        $developers_array = [
            [
                "name" => "Simmaco",
                "surname" => "Nespoli",
                "email" => "simmaco@gmail.com",
                "password"=> bcrypt('simmaco'),
                "address" => "via Roma",
                "github" => "https://github.com/nespolisimmaco",
                "photo" => "photo.jpg",
                "phone" => "082354976294",
                "description" => "I'm a developer",
                "skills" => "Front-end"
            ],
        ];

        foreach ($developers_array as $developers_item) {
            User::create($developers_item);
        }
    }
}
