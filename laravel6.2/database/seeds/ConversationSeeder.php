<?php

use App\Conversation;
use Illuminate\Database\Seeder;


class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Conversation::class)->times(3)->create();
    }
}
