<div class="media" id="comment-{{ $comment->id }}">
    <div class="media-left">
        <a href="#" class="post-profile-image">
            <img
                class="media-object comment-profile-picture"
                src="{{ $comment->author->profile->profile_picture != null ? $comment->author->profile->profile_picture : '/images/profile_picture.jpg' }}" />
        </a>
    </div>
    <div class="media-body">
        <p class="media-heading">
            <span class="glyphicon glyphicon-user"></span> <a href="/profile/{{ $comment->author->username }}">{{ $comment->author->username }}</a>
            <span class="glyphicon glyphicon-time"></span> <a href="/post/show/{{ $comment->post->id }}/#comment-{{ $comment->id }}">{{ $comment->created_at->diffForHumans() }}</a>
        </p>
        <div class="comment-content">{!! $comment->content !!}</div>
    </div>
</div>