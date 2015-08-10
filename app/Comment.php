<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'content'
    ];

    public static function createComment($post_id, $user_id, $content) {
        // TODO: Add validation

        $comment = new Comment;

        $comment->post_id = $post_id;
        $comment->user_id = $user_id;
        $comment->content = $content;

        $comment->save();
    }

    public static function getComments($post_id) {
        $comments = Comment::where('post_id', $post_id)->get();

        return $comments;
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id');
    }
}