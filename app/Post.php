<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_user_id',
        'recipient_user_id',
        'content'
    ];

    public static function createPost($author_user_id, $recipient_user_id, $content)
    {
        // TODO: Add validation

        $post = new Post;

        $post->author_user_id = $author_user_id;
        $post->recipient_user_id = $recipient_user_id;
        $post->content = $content;

        $post->save();
    }

    public static function getUserPosts($user_id)
    {
        $posts = Post::where('recipient_user_id', $user_id)
                ->orderBy('created_at', 'desc')
                ->get();

        return $posts;
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_user_id');
    }

    public function recipient()
    {
        return $this->belongsTo('App\User', 'recipient_user_id');
    }
}