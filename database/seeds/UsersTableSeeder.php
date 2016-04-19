<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
 
        User::create(array(
            'name' => 'user1',
            'email' => 'user1@pelago.event',
            'tel' => '11111111',
            'nationality' => 'Hong Kong',
            'password' => Hash::make('123456')
        ));
 
        User::create(array(
            'name' => 'user2',
            'email' => 'user2@pelago.event',
            'tel' => '22222222',
            'nationality' => 'Singapore',
            'password' => Hash::make('123456')
        ));
    }
}
