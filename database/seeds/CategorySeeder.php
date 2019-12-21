<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $rows = [
            [
                'name' => 'Snacks',
            ],
            [
                'name' => 'BreakFast',
            ],
            [
                'name' => 'Drinks',
            ],
        ];
        DB::table('categories')->insert($rows);
    }
}
