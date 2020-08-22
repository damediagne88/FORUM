<?php

use Illuminate\Database\Seeder;
use App\Topic;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Topic', 50)->create();
    }
}
