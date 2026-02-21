<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker = Faker::create('fa_IR');

        // User::create([
        //     'username' => 'admin',
        //     'fullName' => 'mmd',
        //     'phone' => '09938917751',
        //     'email' => 'admin2@test.com',
        //     'userpassword' => Hash::make('Iliya1441!'),
        //     'role' => 'admin',
        // ]);


         // ایجاد 10 محصول فیک
        for ($i = 0; $i < 90; $i++) {
            DB::table('products')->insert([
                'name' => $faker->word() . ' ' . $faker->randomElement(['Pro', 'Air', 'Max']),
                'price' => $faker->numberBetween(1000000, 100000000),
                'description' => $faker->sentence(8),
                'data' => json_encode([
                    "brand" => $faker->randomElement(['Apple','Samsung','Huawei','Xiaomi']),
                    "variants" => [
                        ["ram" => $faker->randomElement(['4GB','8GB','16GB']), "storage" => $faker->randomElement(['128GB','256GB','512GB'])],
                        ["ram" => $faker->randomElement(['4GB','8GB','16GB']), "storage" => $faker->randomElement(['128GB','256GB','512GB'])]
                    ],
                    "colors" => [
                        ["name" => "مشکی", "hex" => "#000000"],
                        ["name" => "نقره‌ای", "hex" => "#C0C0C0"],
                        ["name" => "طلایی", "hex" => "#FFD700"]
                    ],
                    "ram" => $faker->randomElement(['4GB','8GB','16GB']),
                    "storage" => $faker->randomElement(['128GB','256GB','512GB']),
                    "cpu" => $faker->randomElement(['M1','i5','i7','Snapdragon 8'])
                ]),
                'color' => $faker->randomElement(['red','blue','black','white']),
                'amount' => $faker->numberBetween(0,50),
                'off' => $faker->numberBetween(0,30),
                'type' => $faker->randomElement(['laptop','mobile','watch','airpad']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}



