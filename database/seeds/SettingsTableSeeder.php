<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Settings::create([
            'site_name'     => "Beat-Lara-app",
            'address'       => 'Egypt, Giza',
            'contact_number'=> '+20 2345 1322',
            'contact_email' => 'info@email.com'
        ]);
    }
}
