<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $rows = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'type' => 'admin'
            ],
            [
                'name' => 'Kitchen Staff',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('staff'),
                'type' => 'staff'
            ],
        ];
        DB::table('users')->insert($rows);
    }
}
