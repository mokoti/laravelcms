<?php

namespace App\Http\Controllers;

use App;

class BlogController extends Controller{
    
    /**
     * コンストラクタ
     */    
    public function __construct()
    {
        //再度ログイン防止
        // FIXME:
        //$this->beforeFilter('guest', ['only' => ['getLogin']]);
        //$this->beforeFilter('auth', ['only' => ['getLogout']]);
    }

    /**
     * ブログホーム画面
     */
    public function getIndex()
    {
        // $posts = App\Post::orderBy('id', 'desc')->paginate(10);
        // $posts->getFactory()->setViewName('pagination::simple');

        //$this->layout->title = 'Laravel de Blog';
        //$this->layout->main = View::make('home')->nest('content', 'index', compact('posts'));

        // DBから記事を取得する関数に集約する
        // 1
        // $posts = Post::orderBy('id', 'desc')->paginate(8);
        // 2
        // $posts = DB::table('user')->paginate(8);


        $posts = array(
            'test1' => array(    
                'postname' => 'みかん',
                'thumnail' => 'eyecatch_s.jpg',
                'link' => '2',
                'date' => '2018.02.07',
            ),
            'test2' => array(    
                'postname' => 'りんごの食べ方',
                'thumnail' => 'eyecatch_s.jpg',
                'link' => '2',
                'date' => '2018.02.07',
            ),
        );

        // home画面に渡すデータ
        $data = array(
            'title' => 'Laravel de Blog', 
            'subtitle' => 'sub title',
            'content' => '',
            'posts' => $posts,    
        );
        
        return view('home', $data);
    }

    /**
     * 検索機能
     */ 
    public function getSearch()
    {
        $searchTerm = Input::get('s');
        $posts = App\Post::where('title', 'LIKE', '%'.$searchTerm.'%')->pagination(10);
        $posts->getFactory()->setViewName('pagination::slider');
        $posts->appends(['s'=>$searchTerm]);
        
        $this->layout->with('title', '検索:'.$searchTerm);
        $this->layout->main = View::make('home')->nest('content', 'index', ($posts->isEmpty())
            ? ['notFound'=>true] : compact('posts'));
    }

    /**
     * ログイン画面へ
     */
    public function getLogin()
    {
        $this->layout->title = 'login';
        $this->layout->main = View::make('login');
    } 

    /**
     * ログイン
     */
    public function postLogin()
    {
        $credentials = [
            'username'=>Input::get('username'),
            'password'=>Input::get('password')
        ];

        $rules = [
            'username'=>'required',
            'password'=>'required'
        ];

        $validator = Validator::make($credentials, $rules);
        if($validator->passes()){
            if(Auth::attempt($credentials)){
                return Redirect::to('admin/dash-board');
            }else{
                return Redirect::back()->withInput()->with('failure', '正しいユーザー名/パスワードを入力して下さい。');
            }
        }else{
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    /**
     * ログアウト
     */
    public function getLogout(){
        Auth::logout();
        return Redirect::to('/');
    }

   
}
