<?php

use App\Model\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            'id' => 1,
            'title' => 'This is our First Post',
            'excerpt' => 'This is a Sample Post seeded by Laravel',
            'body' => 'This is a Sample Post seeded by LaravelThis is a Sample Post seeded by LaravelThis is a Sample Post seeded by LaravelThis is a Sample Post seeded by Laravel',
            'featured_image' => '',
            'post_by_id' => '',
        ];

        Post::insert($posts);
    }
}
