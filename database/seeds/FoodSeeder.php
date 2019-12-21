<?php

use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->truncate();
        $rows = [
            [
                'category_id' => 1,
                'name' => 'French Fries',
                'description' => 'French Fries',
                'price' => '200',
                'allow_today' => 'yes'
            ],
              [
                'category_id' => 1,
                'name' => 'Chips',
                'description' => 'Chips',
                'price' => '100',
                'allow_today' => 'yes'
            ],
              [
                'category_id' => 2,
                'name' => 'Fry Rice',
                'description' => 'Fry Rice',
                'price' => '200',
                'allow_today' => 'yes'
            ],   [
                'category_id' => 2,
                'name' => 'Chowmin',
                'description' => 'Chowmin',
                'price' => '150',
                'allow_today' => 'yes'
            ],
              [
                'category_id' => 3,
                'name' => 'Coke',
                'description' => 'Coke',
                'price' => '40',
                'allow_today' => 'yes'
            ],
              [
                'category_id' => 3,
                'name' => 'Fanta',
                'description' => 'Fanta',
                'price' => '40',
                'allow_today' => 'yes'
            ],

        ];
        DB::table('foods')->insert($rows);
    }
}
