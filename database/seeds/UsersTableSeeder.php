<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([

            'name'=> 'Yraxy',
            'role_id' => 1,
            'is_active' => 1,
            'email' => 'yraxy@gmail.com',
            'password' => bcrypt('secret')


        ]);




    }
}
