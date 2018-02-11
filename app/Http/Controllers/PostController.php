<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Post;
use Request;
use Validator;
use Auth;
use DateTime;
use Redirect;
use Illuminate\Foundation\Validation\ValidatesRequests;


//use \App\Log\Logger; 保留
use Illuminate\Support\Facades\Log;

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

    /**
     * 新しい記事を編集する画面へ遷移
     */
    public function newPost()
    {
        // $this->layout->title = '新規投稿';
        // $this->layout->main = View::make('dash')->nest('content', 'posts.new');

        // 新規投稿画面に渡すデータ
        $data = array(
            'title' => \Config::get('global.title.newpost'), 
        );
        return view('new', $data);
    }

    /**
     * 記事の内容を確認する
     */
    public function confirmPost(Request $request)
    {
        // 投稿確認画面へ渡すデータ
        $data = array(
            'headline' => Request::input('headline'),
            'text' => Request::input('text'),
        );

        return view('confirm', $data);
    }

    /**
     * 記事を保存する
     * DBへ保存し、公開・非公開・下書きでグルーピングする
     */
    public function savePost()
    {

    
        $post = [
            'headline' => Request::input('headline'),
            'content' => Request::input('text'),
        ];

        $rules = [
            'headline' => 'required',
            'content' => 'required',
        ];

        $validator = Validator::make($post, $rules);
        if($validator->passes()){
            $post = new Post($post);
            $post->author_id = '1';//Auth::user()->id;
            $post->content = Request::input('text');
            $date = new DateTime();
            $post->date = $date->format('Y-m-d H:i:s');
            $post->comment_count = 0;
            $post->save();
            return view('dash-board', ['success' => 'true']);
            //->with('success', '投稿が保存されました');
        }else{
            return view('dash-board', ['success' => 'false']);
        }
    }

    /**
     * 既存の記事を編集する
     */
    public function editPost(Post $post)
    {
        $this->layout->title = '記事の編集';
        $this->layout->main = View::make('dash')->nest('content', 'posts.edit', compact('post'));
    }

    /**
     * 記事を削除する
     */
    public function deletePost(Post $post)
    {
        $post->delete();
        return Redirect::route('posts.list')->with('success', '記事が削除されました');
    }

    
}
