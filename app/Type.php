<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $primaryKey = "type_id";
    protected $table = "types";
    protected $fillable=['name','description'];
    public function posts()
    {
        return $this->hasMany('App\Post','type_id');
    }
}
