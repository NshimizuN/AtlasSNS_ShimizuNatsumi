<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class YourModel extends Model
{
    // 参照させたいSQLのテーブル名を指定してあげる
    protected $table = 'follows';
}

class User extends Authenticatable
{
    use Notifiable;

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    //フォローする
    //public function follow(Int $user_id)
    //{
    //    return $this->follows()->attach('$user_id');
    //}

    // フォロワー→フォロー
    public function followers()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
        //(関連モデル,テーブル,関連ID1,関連ID2)
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }

    //フォローしているか
    public function isFollowing($user_id)
    {
        return (bool) $this->follows()->where('followed_id', $user_id)->User::first(['id']);
    }

    //フォローされているか
    public function isFollowed($user_id)
    {
        return (bool) $this->follows()->where('following_id', $user_id)->User::first(['id']);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
