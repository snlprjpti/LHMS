<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->delete();
        $rows = [
            [
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'password' => bcrypt('employee'),
                'designation' => 'Web Developer',
                'verified' => 'yes',
            ],
        ];
        DB::table('employees')->insert($rows);
    }
}
