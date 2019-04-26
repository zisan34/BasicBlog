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
        //
        \App\Setting::create([
        	'site_name'=>"Laravel's Blog",
        	'address'=>'Noakhali, Bangladesh',
        	'contact_no'=>'1234567890',
        	'contact_email'=>'laravel@laravel.com'
        ]);
    }
}
