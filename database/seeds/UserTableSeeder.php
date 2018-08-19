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
        
        $user_1 =User::create([
            'name' => 'Yassine',
            'email' => 'yassine_msiah@hotmail.com',
            'password' => bcrypt(123456)
        ]);
        $user_2 =User::create([
            'name' => 'Andy',
            'email' => 'andy_james@hotmail.com',
            'password' => bcrypt(123456)
        ]);
        $user_3 =User::create([
            'name' => 'Tim',
            'email' => 'tim_humble@hotmail.com',
            'password' => bcrypt(123456)
        ]);
        
        
        
    }
    
}
