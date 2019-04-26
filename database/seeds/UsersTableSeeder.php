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
        //
        $user=App\User::create([
        	'name'=>'Fazlul Kabir',
        	'email'=>'fazlulkabir34@gmail.com',
        	'password'=>bcrypt('123456'),
        	'admin'=>1

        ]);

        App\Profile::create([

        	'user_id'=>$user->id,
        	'avatar'=>'/uploads/avatar/1.png',
        	'about'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, similique?',
        	'facebook'=>'facebook.com',
        	'youtube'=>'youtube.com'
        ]);
    }
}
