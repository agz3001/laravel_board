<?php

use Illuminate\Database\Seeder;
use App\Thread;
use App\Post;
class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Thread::class, 3)
        ->create()
        ->each(function ($thread){
          $posts =factory(App\Post::class, 2)->make();
          $thread->posts()->saveMany($posts);
        });
    }
}
