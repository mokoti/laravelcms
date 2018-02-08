<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Post;
use App\Comment;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = 'test'; 

        for ($i=1; $i<=20; $i++){
            $post = new App\Post;
            $post->title = "$i 番目の投稿";
            $post->author_id = 1;
            $post->read_more = substr($content, 0, 120);
            $post->content = $content;
            $post->comment_count = 0;
            $post->save();

            $maxComments = mt_rand(3,15);
            for($j=0; $j<=$maxComments; $j++){
                $comment = new App\Comment;
                $comment->commenter = '名無し';
                $comment->comment = substr($content, 0, 120);
                $comment->email = 'xyz@example.com';
                $comment->approved = 1;
                $post->comments()->save($comment);
                $post->increment('comment_count');
            }
        }
    }
}
