<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Paulo Cesar',
            'email' => 'pchenrique1998@hotmail.com',
            'registration' => '1',
            'password' => bcrypt('123123123'),
            'fk_user_group_id' => 4,
        ]);
    }
}
