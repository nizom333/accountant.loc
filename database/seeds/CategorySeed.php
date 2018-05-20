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
        DB::table('categories')->insert([
			[
				'id'=> '1',
				'name'=>'Доходы',
				'parent_id'=>'7',
				'class'=>'mdi mdi-book-open-variant'
			],[
				'id'=> '2',
				'name'=>'Затраты',
				'parent_id'=>'7',
				'class'=>'mdi mdi-book-open-variant'
			],[
				'id'=> '3',
				'name'=>'Заработная плата',
				'parent_id'=>'1',
				'class'=>'mdi mdi-book-open-variant'
			],[
				'id'=> '4',
				'name'=>'Иные доходы',
				'parent_id'=>'1',
				'class'=>'mdi mdi-book-open-variant'
			],[
				'id'=> '5',
				'name'=>'Продукты питания',
				'parent_id'=>'2',
				'class'=>'mdi mdi-book-open-variant'
			],[
				'id'=> '6',
				'name'=>'Транспорт',
				'parent_id'=>'2',
				'class'=>'mdi mdi-book-open-variant'
			],[
				'id'=> '7',
				'name'=>'Мобильная связь',
				'parent_id'=>'2',
				'class'=>'mdi mdi-book-open-variant'
			],[
				'id'=> '8',
				'name'=>'Интернет',
				'parent_id'=>'2',
				'class'=>'mdi mdi-book-open-variant'
			],[
				'id'=> '9',
				'name'=>'Развлечения',
				'parent_id'=>'2',
				'class'=>'mdi mdi-book-open-variant'
			],[
				'id'=> '10',
				'name'=>'Другое',
				'parent_id'=>'2',
				'class'=>'mdi mdi-book-open-variant'
			]
		]);
    }
}