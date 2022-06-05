<?php

use Illuminate\Database\Seeder;
use App\Chatroom;

class ChatroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chatroom1 = new Chatroom();
        $chatroom1->name = 'Chuyên gia tư vấn';
        $chatroom1->description = 'Chuyên gia sẽ giải đáp mọi thắc mắc về quyền tác giả, luật SHTT';
        $chatroom1->save();

        $chatroom2 = new Chatroom();
        $chatroom2->name = 'Cộng đồng';
        $chatroom2->description = 'Nơi tất cả mọi người có thể thảo luận về quyền tác giả, luật SHTT';
        $chatroom2->save();
    }
}