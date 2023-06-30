<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages_array = config('messages');

        foreach ($messages_array as $messages_item) {
            $message = new Message();
            $message->name = $messages_item['name'];
            $message->surname = $messages_item['surname'];
            $message->email = $messages_item['email'];
            $message->request = $messages_item['request'];
            $message->save();
        }
    }
}
