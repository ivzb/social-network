<ul>
    <h3>post:</h3>
    <li>author: <a href="/profile/{{ $post->author->username }}">{{ $post->author->username }}</a></li>
    <li>recipient: <a href="/profile/{{ $post->recipient->username }}">{{ $post->recipient->username }}</a></li>
    <li>content: {{ $post->content }}</li>
    <li>created at: {{ $post->created_at }}</li>
    <li>
        {!! Form::open(array('action' => 'CommentController@store')) !!}
        {!! Form::text('comment_content', null, ['placeholder' => 'Add comment.']) !!}
        {!! Form::hidden('post_id', $post->id) !!}
        {!! Form::submit('Comment') !!}
        {!! Form::close() !!}
    </li>
    <h3>comments:</h3>
    <ul>
        @foreach ($post->comments as $comment)
            <li>@include('../comments.comment_content', [ 'comment' => $comment ])</li>
        @endforeach
    </ul>
</ul>