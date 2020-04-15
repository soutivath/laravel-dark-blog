<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replycomment extends Model
{
    protected $table = 'replycomments';
    protected $fillable=['body','user_id','comment_id'];
    protected $primaryKey ="reply_id";
    public function comments()
    {
        return $this->belongsTo('App\Comment','comment_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
