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
        'id',
        'post_id',
        'user_id',
        'content'
    ];

    public static function createComment($comment_id, $user_id, $content) {
        // TODO: Add validation

        $comment = new Comment;

        $comments_count = Comment::getCommentsCount($comment_id);

        $comment->id = $comment_id . '/' . ($comments_count + 1);
        $comment->user_id = $user_id;
        $comment->content = $content;

        $comment->save();
    }

    public static function getPostComments($post_id) {
        $comments = Comment::where('id', 'LIKE', $post_id . '/%')->get();

        return $comments;
    }

    private static function getCommentsCount($comment_id) {
        $comments_count = Comment::where('id', 'LIKE', $comment_id . '/%')->count();

        return $comments_count;
    }
}