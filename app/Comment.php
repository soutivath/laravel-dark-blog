<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable=['body','post_id','user_id','post_id'];
    protected $primaryKey = 'comment_id';
    public function posts()
    {
        return $this->belongsTo('App\Post','post_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function replycomments()
    {
        return $this->hasMany('App\Replycomment','comment_id');
    }
}
