<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name'=>'Rafiqul Islam',
                'email'=>'therims1954@gmail.com',
                'password'=>bcrypt('janina'),
                'role'=>'admin',
                'mobile'=>'01836886761',
            ]
        );

        User::create(
            [
                'name'=>'L Roman',
                'email'=>'roman@gmail.com',
                'password'=>bcrypt('kichuekta'),
                'role'=>'manager',
                'mobile'=>'01710882198',
            ]
        );
    }
}
