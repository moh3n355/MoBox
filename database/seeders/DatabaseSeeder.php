<?php

namespace Database\Seeders;

use App\Models\User;
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
        $faker = Faker::create('fa_IR');



        // لیست ویژگی‌ها برای داده‌های محصول
        $specs = [
            'تاریخ_عرضه' => [],
            'وزن' => [],
            'ابعاد' => [],
            'توضیحات_بدنه' => [],
            'وبکم' => [],
            'نمایشگر' => [],
            'نرخ_تازه‌سازی' => [],
            'روشنایی_نمایشگر' => [],
            'چگالی' => [],
            'پردازنده' => [],
            'تعداد_هسته' => [],
            'کارت_گرافیک' => [],
            'حافظه' => ['256GB', '512GB', '1TB', '2TB'],
            'رم' => ['2GB', '4GB', '6GB', '8GB', '16GB', '32GB', '64GB'],
            'کش' => [],
            'شبکه' => ['5G', '4G', '3G', 'LTE', '2G'],
            'پورت‌ها' => [],
            'سیم‌کارت' => [],
            'حسگر_اثر_انگشت' => [],
            'باتری' => [],
            'توان_شارژ' => [],
            'اقلام_همراه' => [],
        ];

        $types = ['laptop', 'mobile', 'watch', 'airpad'];
        $colors = [
            'مشکی' => '#000000',
            'آبی' => '#0000FF',
            'قرمز' => '#FF0000',
            'سفید' => '#FFFFFF',
            'طلایی' => '#FFD700',
            'نقره‌ای' => '#C0C0C0',
        ];
        // ایجاد 50 محصول فیک
        for ($i = 0; $i < 150; $i++) {
            $colorName = $faker->randomElement(array_keys($colors)); // اسم رنگ تصادفی
            $colorHex = $colors[$colorName];

            DB::table('products')->insert([
                'name' => $faker->word() . ' ' . $faker->randomElement(['pro', 'air', 'max']),
                'price' => $faker->numberBetween(1000000, 100000000),
                'description' => $faker->sentence(8),
                'data' => json_encode([
                    "برند" => $faker->randomElement(['Apple', 'Samsung', 'Lenovo', 'Hp', 'Microsoft']),
                    "نسخه ها" => [
                        ["رم" => $faker->randomElement($specs['رم']), "حافظه" => $faker->randomElement($specs['حافظه'])],
                        ["رم" => $faker->randomElement($specs['رم']), "حافظه" => $faker->randomElement($specs['حافظه'])]
                    ],
                    "رنگ‌ها" => [
                        ["name" => $colorName, "hex" => $colorHex],
                    ],
                    "رم" => $faker->randomElement($specs['رم']),
                    "حافظه" => $faker->randomElement($specs['حافظه']),
                    "پردازنده" => $faker->randomElement(array: [
                        'Intel Celeron N4020',
                        'Intel Celeron N4500',
                        'Intel Pentium Silver N6000',
                        'Intel Core i3 1115G4',
                        'Intel Core i3 1215U',
                        'Intel Core i5 1135G7',
                        'Intel Core i5 1235U',
                        'Intel Core i5 12450H',
                        'Intel Core i7 1165G7',
                        'Intel Core i7 1255U',
                        'Intel Core i7 12700H',
                        'Intel Core i9 12900H',

                        'AMD Ryzen 3 3250U',
                        'AMD Ryzen 3 5300U',
                        'AMD Ryzen 5 3500U',
                        'AMD Ryzen 5 5500U',
                        'AMD Ryzen 5 5600H',
                        'AMD Ryzen 7 4700U',
                        'AMD Ryzen 7 5700U',
                        'AMD Ryzen 7 5800H',
                        'AMD Ryzen 9 5900HX',

                        'A13 Bionic',
                        'A14 Bionic',
                        'A15 Bionic',
                        'A16 Bionic',
                        'A17 Pro',

                        'Snapdragon 680',
                        'Snapdragon 695',
                        'Snapdragon 732G',
                        'Snapdragon 778G',
                        'Snapdragon 7 Gen 1',
                        'Snapdragon 7+ Gen 2',
                        'Snapdragon 8 Gen 1',
                        'Snapdragon 8+ Gen 1',
                        'Snapdragon 8 Gen 2',
                        'Snapdragon 8 Gen 3',

                        'Dimensity 700',
                        'Dimensity 810',
                        'Dimensity 900',
                        'Dimensity 1080',
                        'Dimensity 1200',
                        'Dimensity 1300',
                        'Dimensity 8200',
                        'Dimensity 9000',
                        'Dimensity 9200',

                        'Exynos 850',
                        'Exynos 1280',
                        'Exynos 1380',
                        'Exynos 2100',
                        'Exynos 2200',
                        'Exynos 2400',
                    ]),
                    "کارت_گرافیک" => $faker->randomElement([
                        'Intel UHD Graphics',
                        'Intel Iris Xe',
                        'NVIDIA GeForce MX450',
                        'NVIDIA GeForce GTX 1650',
                        'NVIDIA GeForce RTX 2050',
                        'NVIDIA GeForce RTX 3050',
                        'NVIDIA GeForce RTX 3060',
                        'NVIDIA GeForce RTX 3070',
                        'NVIDIA GeForce RTX 4050',
                        'NVIDIA GeForce RTX 4060',
                        'NVIDIA GeForce RTX 4070',
                        'AMD Radeon Vega 7',
                        'AMD Radeon RX 6500M',
                        'AMD Radeon RX 6600M',
                        'AMD Radeon RX 7600M',
                    ]),
                    'تعداد_هسته' =>$faker->randomElement([
                        '4 هسته‌ای',
                        '6 هسته‌ای',
                        '8 هسته‌ای',
                        '10 هسته‌ای',
                    ]),

                ]),
                'color' => $faker->randomElement($colors),
                'amount' => $faker->numberBetween(0, 50),
                'off' => $faker->numberBetween(0, 30),
                'type' => $faker->randomElement($types),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}