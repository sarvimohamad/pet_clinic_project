<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
          'first_name'=>'mohamad',
           'last_name'=>'sarvi',
          'email'=>'mohamad.sarvi.1515@gmail.com',
          'password'=>'1234',
           'is_admin'=>'1',
       ]);
    }
}
