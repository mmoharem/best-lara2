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
        App\User::create([
            'name' => 'mohamed moharram',
            'email'=> 'admin@mail.com',
            'password'=> bcrypt('momast5546')
        ]);
    }
}
