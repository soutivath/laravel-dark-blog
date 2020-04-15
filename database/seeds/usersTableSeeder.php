<?php

use Illuminate\Database\Seeder;


class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'=>'soutivath',
                'email'=>'soutivath@gmail.com',
                'position'=>1,
                'password'=>Hash::make('arisa2020'),
            ]
            );
    }
}
