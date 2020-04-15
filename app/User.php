<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    const DEFAULT_USER_ROLE = 0;
    const ADMIN_ROLE=1;

    public function isAdmin()
    {
        return $this->position === SELF::ADMIN_ROLE;
    }
    public function comments()
    {
        return $this->hasMany('App\Comment','user_id');
    }
    public function posts()
    {
        return $this->hasMany('App\Post','user_id');
    }
    public function replycomments()
    {
        return $this->hasMany('App\Replycomment','user_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $primaryKey = 'user_id';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
