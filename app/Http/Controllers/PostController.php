<?php

namespace App\Http\Controllers;

class PostController extends Controller{

    public function listPost()
    {
        // AuthユーザーIDを取得
        $id = Auth::user()->id;

        // ユーザーIDとauthorIDの等しい記事を取得する
        $posts = Post::where('author_id', '=', $id)->get();

        $this->layout->title = '記事一覧';
        $this->layout->main = View::make('dash')->nest('content', 'posts.list', compact('posts'));
    }

    public function showPost(Post $post)
    {
        $comments = $post->comments()->where('approved', '=', 1)->get();
        $this->layout->title = $post->title;

        $this->layout->main = View::make('home')->nest('content', 'posts.single', compact('post', 'comments'));
    }

    public function newPost()
    {
        $this->layout->title = '新規投稿';
        $this->layout->main = View::make('dash')->nest('content', 'posts.new');
    }

    public function editPost(Post $post)
    {
        $this->layout->title = '記事の編集';
        $this->layout->main = View::make('dash')->nest('content', 'posts.edit', compact('post'));
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return Redirect::route('posts.list')->with('success', '記事が削除されました');
    }

    public function savePost()
    {
        $post = [
            'title' => Input::get('title'),
            'content' => Input::get('content'),
        ];

        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];

        $valid = Validator::make($post, $rules);
        if($valid->passes()){
            $post = new Post($post);
            $post->author_id = Auth::user()->id;
            $post->comment_count = 0;
            $post->read_more = (strlen($post->content) > 120) ? sbstr($post->content, 0, 120) : $post->content;
            $post->save();
            return Redirect::to('admin/dash-board')->with('success', '投稿が保存されました');
        }else{
            return Redirect::back()->withErrors($valid)->withInput();
        }
    }
}
