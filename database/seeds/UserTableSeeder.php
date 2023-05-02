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
        $users = [
            [ 
                'name'=>"admin",
                'email'=>"admin@algeriainvest.com",
                'password'=>bcrypt("admin@AI123"),
            ],
        ];
        User::insert($users);
    }
}
