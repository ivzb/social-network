<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'birth_date',
        'gender',
        'location',
        'about_me',
        'website',
        'facebook',
        'twitter',
        'google+'
    ];

    public static function getUserProfile($user_id) {
        return Profile::where('user_id', $user_id)->firstOrFail();
    }

    public static function setProfilePicture($user_id, $picture_path) {
        return Profile::where('user_id', $user_id)->update([ 'profile_picture' => $picture_path ]);
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id');
    }
}