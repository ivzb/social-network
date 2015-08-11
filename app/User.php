<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'first_name', 'last_name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static function getUser($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return $user;
    }

    public static function getUserId($username)
    {
        $userId = User::where('username', $username)->select('id')->firstOrFail();

        return $userId;
    }

    public static function getUsername($user_id)
    {
        $userId = User::where('id', $user_id)->select('username')->firstOrFail();

        return $userId;
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile', 'user_id');
    }
}
