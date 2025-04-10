<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);

        DB::table('services')->insert([
            [
                'title' => 'Открытая игра',
                'path_img' => './images/service1.jpg',
                'description' => 'Игра от 2 до 10 человек. Каждый игрок платит за себя самостоятельно, к вам могут присоединиться другие игроки.',
                'price' => '900 рублей за час за одного человека',
            ],
            [
                'title' => 'Аренда арены',
                'path_img' => './images/service2.jpg',
                'description' => 'Игра от 2 до 10 человек. Аренда игровой арены для игры своей компанией. ',
                'price' => '8000 рублей за час за компанию',
            ],
            [
                'title' => 'Корпоратив',
                'path_img' => './images/service3.jpg',
                'description' => 'Игра от 2 до 20 человек. В программу включено:
                                    1)	Игра на арене WARPOINT 110 минут
                                    2)	Отдельная лаунж зона для проведения торжества
                                    3)	Дополнительные активности
                                    - Зажигательный Just Dance с гостями
                                    - Игра на приставке 
                                    - Игра "Корнхол"',
                'price' => '15000 рублей за 2 часа за компанию',
            ],
        ]);
    }
}
