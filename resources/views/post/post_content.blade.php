<ul>
    <li>author: <a href="/profile/{{ $post->author->username }}">{{ $post->author->username }}</a></li>
    <li>recipient: <a href="/profile/{{ $post->recipient->username }}">{{ $post->recipient->username }}</a></li>
    <li>content: {{ $post->content }}</li>
    <li>created at: {{ $post->created_at }}</li>
    <li>Comments:
        {!! Form::open(array('action' => 'CommentController@store')) !!}
        {!! Form::textarea('comment_content', null, ['placeholder' => 'Add comment.']) !!}
        {!! Form::hidden('comment_id', $post->id) !!}
        {!! Form::submit('Comment') !!}
        {!! Form::close() !!}
    </li>
    {{ CommentsHelper::showComments()}}
</ul>