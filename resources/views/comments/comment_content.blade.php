<ul>
    <li>author: <a href="/profile/{{ $comment->author->username }}">{{ $comment->author->username }}</a></li>
    <li>content: {{ $comment->content }}</li>
    <li>created at: {{ $comment->created_at }}</li>
</ul>