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
        $user = App\User::create([
            'name'      => 'mohamed moharram',
            'email'     => 'admin@mail.com',
            'password'  => bcrypt('momast5546'),
            'admin'     => 1
        ]);
        App\Profile::create([
            'user_id'   => $user->id,
            'avatar'    => 'link to image',
            'about'     => 'This text about user',
            'facebook'  => 'facebook.com',
            'youtube'   => 'youtube.com'
        ]);
        

    }
}
