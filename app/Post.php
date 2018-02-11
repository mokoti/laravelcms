<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * create()やupdate()で入力を受け付ける ホワイトリスト
     */
    protected $fillable = ['headline', 'thumnail'];


	// home画面で提供する情報
    protected $headline;
    protected $thumnail;
    protected $link;
    protected $date;

    protected $author;
    protected $content;

    // Commentクラスのリストを持つ
    protected $comments;

    /**
     * DBから記事を取得する
     */
    public static function get()
    {

    	// DBから記事を取得する関数に集約する
        // →これもModelの中でやる
        // 1
        // $posts = Post::orderBy('id', 'desc')->paginate(8);
        // 2
        // $posts = DB::table('user')->paginate(8);

    	//$posts = \DB::select('select * from posts');

    	// サンプル
    	$posts = array(
            'test1' => array(    
                'headline' => 'みかん',
                'thumnail' => 'eyecatch_s.jpg',
                'link' => '2',
                'date' => '2018.02.07',
            ),
            'test2' => array(    
                'headline' => 'りんごの食べ方',
                'thumnail' => 'eyecatch_s.jpg',
                'link' => '2',
                'date' => '2018.02.07',
            ),
        );

    	return $posts;
    }

  /**
   * 記事の投稿(DBへ送信する)
   * 
   */
  // public function save()
  // {



  // }



    // リレーションの設定

    public function comments(){
        return $this->hasMany("App\Comment");
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
