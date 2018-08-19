<?php

use Illuminate\Database\Seeder;

use App\Friend;

class FriendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $friend_1 =Friend::create([
            'user_id' => 1,
            'friend_id' => 2
        ]);
        $friend_2 =Friend::create([
            'user_id' => 1,
            'friend_id' => 3
        ]);
        
    }
}
