<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('admins')->first())
            return;

        DB::table('admins')->insert([
            'name' => str_random(5).' '.str_random(5) ,
            'job_title' => '',
            'email' =>'tenhayko@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
