<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $fileable = ['title', 'content'];

	// home画面で提供する情報
    protected $postname;
    protected $thumnail;
    protected $link;
    protected $date;

    protected $author;
    protected $content;

    // Commentクラスのリストを持つ
    protected $comments;


    public function comments(){
        return $this->hasMany("App\Comment");
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
