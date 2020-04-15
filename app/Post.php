<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
   protected $table = "posts";
   protected $fillable = ['title','body','coverImage','type_id','user_id'];
   protected $primaryKey = "post_id";
   public function types()
   {
      return $this->belongsTo('App\Type','type_id');
   }
   public function comments()
   {
      return $this->hasMany('App\Comment','post_id');
   }
   public function users()
   {
      return $this->belongsTo('App\User','user_id');
   }
}
