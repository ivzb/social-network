<div class="panel panel-default" id="post-{{ $post->id }}">
    <div class="panel-body post-container-body">
        <div class="media">
            <div class="media-left">
                <a href="#" class="post-profile-image">
                    <img
                        class="media-object post-profile-picture"
                        src="{{ $post->author->profile->profile_picture != null ? $post->author->profile->profile_picture : '/images/profile_picture.jpg' }}" />
                </a>
            </div>
            <div class="media-body">
                <p class="media-heading">
                    <span class="glyphicon glyphicon-user"></span> <a href="/profile/{{ $post->author->username }}">{{ $post->author->username }}</a>
                    @unless ($post->author->username == $post->recipient->username)
                        <span class="glyphicon glyphicon-share-alt"></span>
                        <span class="glyphicon glyphicon-user"></span>
                        <a href="/profile/{{ $post->recipient->username }}">{{ $post->recipient->username }}</a>
                    @endunless
                </p>
                <span class="glyphicon glyphicon-time"></span> <a href="/post/show/{{ $post->id }}">{{ $post->created_at->diffForHumans() }}</a>
            </div>

            <div class="media post-container-content">
                <div class="media-body">
                    <div class="post-content">{!! $post->content !!}</div>
                    <div class="post-info">
                        <span>{{ $post->likes->count() }} like{{ $post->likes->count() != 1 ? 's' : null }}</span>,
                        <span>{{ $post->comments->count() }} comment{{ $post->comments->count() != 1 ? 's' : null }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <span class="glyphicon glyphicon-thumbs-up"></span>
        @if ($post->likes->where('post_id', $post->id)->where('user_id', $user->id)->count() > 0)
            <a href="/post/dislike/{{ $post->id }}" @if ($comments_count == 'limited') target="_blank" @endif>Dislike</a>
        @else
            <a href="/post/like/{{ $post->id }}" @if ($comments_count == 'limited') target="_blank" @endif>Like</a>
        @endif
        <span class="glyphicon glyphicon-comment"></span> <a href="#/" onclick="$('#comment-content').focus();">Comment</a>

        <div class="comment-form">
            {!! Form::open(array('action' => 'CommentController@store')) !!}
            {!! Form::text('comment_content', null, ['placeholder' => 'Add comment...', 'id' => 'comment-content', 'class' => 'form-control']) !!}
            {!! Form::hidden('post_id', $post->id) !!}
            {!! Form::close() !!}
        </div>

        @if ($comments_count == 'unlimited')
            @foreach ($post->comments as $comment)
                <p>@include('../comments.comment_content', [ 'comment' => $comment ])</p>
            @endforeach
        @elseif ($comments_count == 'limited')
            @if (count($post->comments) > 3)
                <p class="comments-show-all-link"><a href="/post/show/{{ $post->id }}">Show more comments...</a></p>
            @endif

            @foreach ($post->comments->take(3) as $comment)
                @include('../comments.comment_content', [ 'comment' => $comment ])
            @endforeach
        @endif
    </div>
</div>