<?php

use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Миграция категории
        DB::table('categories')->insert([
            [
                'id' => 1,
                'title' => 'Доходы',
                'parent_id' =>null,
                'class' => 'fas fa-hand-holding-usd'
            ],
            [
                'id' => 2,
                'title' => 'Затраты',
                'parent_id' =>null,
                'class' => 'fas fa-money-check-alt'
            ],
            [
                'id' => 3,
                'title' => 'Заработная плата',
                'parent_id' =>1,
                'class' => ''
            ],
            [
                'id' => 4,
                'title' => 'Иные доходы',
                'parent_id' =>1,
                'class' => ''
            ],
            [
                'id' => 5,
                'title' => 'Интернет',
                'parent_id' =>2,
                'class' => ''
            ],
            [
                'id' => 6,
                'title' => 'Продукты питания',
                'parent_id' =>2,
                'class' => ''
            ],
            [
                'id' => 7,
                'title' => 'Транспорт',
                'parent_id' =>2,
                'class' => ''
            ],
            [
                'id' => 8,
                'title' => 'Мобильная связь',
                'parent_id' =>2,
                'class' => ''
            ],
            [
                'id' => 9,
                'title' => 'Развлечения',
                'parent_id' =>2,
                'class' => ''
            ],
            [
                'id' => 10,
                'title' => 'Другое',
                'parent_id' =>2,
                'class' => ''
            ]
        ]);
    }
}
