<?php

use App\Category;
use Illuminate\Database\Seeder;
use App\Post;

class FkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $category = Category::inRandomOrder()->first()->id;
            $post->category_id = $category;
            $post->update();
        }
    }
}
