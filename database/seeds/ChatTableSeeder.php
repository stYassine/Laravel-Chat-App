<?php

use Illuminate\Database\Seeder;

use App\Chat;

class ChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $chat_1 =Chat::create([
            'user_id' => 1,
            'friend_id' => 2,
            'chat' => 'Hi There'
        ]);
        $chat_2 =Chat::create([
            'user_id' => 2,
            'friend_id' => 1,
            'chat' => 'Hello'
        ]);
        
        $chat_3 =Chat::create([
            'user_id' => 1,
            'friend_id' => 3,
            'chat' => 'Sup'
        ]);
        $chat_4 =Chat::create([
            'user_id' => 3,
            'friend_id' => 1,
            'chat' => 'How Are You'
        ]);
        
    }
}
