<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++){
            $new_post = new Post();
            $new_post->name = $faker->lastName();
            $new_post->location = $faker->country();
            $new_post->slug = Str::slug($faker->name, '-');
            $new_post->email = $faker->email();
            $new_post->save();
        }
    }
}
