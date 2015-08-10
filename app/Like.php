<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'likes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'user_id',
        'post_id',
        'comment_id'
    ];

    public static function createPostLike($post_id, $user_id) {
        $like = new Like;

        if (Like::isPostLiked($post_id, $user_id)) {
            abort(403, 'You can not like the same post twice.');
        }

        $like->type = 'post';
        $like->post_id = $post_id;
        $like->user_id = $user_id;

        $like->save();
    }

    public static function deletePostLike($post_id, $user_id) {
        if (!Like::isPostLiked($post_id, $user_id)) {
            abort(403, 'You have to like the post before disliking it.');
        }

        Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
    }

    public static function createCommentLike($comment_id, $user_id) {
        $like = new Like;

        $like->type = 'comment';
        $like->comment_id = $comment_id;
        $like->user_id = $user_id;

        $like->save();
    }

    public static function isPostLiked($post_id, $user_id) {
        if (Like::where('post_id', $post_id)->where('user_id', $user_id)->count() > 0) {
            return true;
        }

        return false;
    }

    public static function getPostLikes($post_id) {
        $likes = Like::where('post_id', $post_id)->get();

        return $likes;
    }

    public static function getCommentLikes($comment_id) {
        $likes = Like::where('comment_id', $comment_id)->get();

        return $likes;
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}