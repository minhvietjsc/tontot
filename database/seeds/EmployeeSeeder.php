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
       	DB::table('employees')->insert([
       		'name'=>'nguyen van G',
       		'email'=>'nguyenvang@gmail.com',
       		'phone'=>'0979631649',
       		'address'=>'cau giay - ha noi',
       ]);
    }
}
