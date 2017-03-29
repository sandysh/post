<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name'      => 'Sandesh Satyal',
            'email'     => 'sandeshsatyal@gmail.com',
            'password'  => bcrypt('sandy@123'),
            ]);
    }
}
