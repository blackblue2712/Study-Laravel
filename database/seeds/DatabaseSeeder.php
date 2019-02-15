<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
       /* DB::table('users')->insert
        (
        	['name' => str_random(5), 'email' => str_random(5).'@gmail.com', 'password' => bcrypt('123')],
        );*/

        $this->call(usersSeeder::class);
    }
}

class usersSeeder extends Seeder
{
	public function run()
    {        
        DB::table('users')->insert
        (
        	[
        		['name' => 'Liar', 'email' => str_random(5).'@gmail.com', 'password' => bcrypt('123')],
        		['name' => 'Blue', 'email' => str_random(5).'@gmail.com', 'password' => bcrypt('123')],
        		['name' => 'Black', 'email' => str_random(5).'@gmail.com', 'password' => bcrypt('123')]		
        	]
        );
    }
}
