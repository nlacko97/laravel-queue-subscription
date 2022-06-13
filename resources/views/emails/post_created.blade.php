<h3>
    Dear {{ $user->name }},
</h3>

<p>
    You are receiving this notification because the website <a
        href="{{ $post->website->url }}">{{ $post->website->name }}</a> has published a new post. You can find it
    below.
</p>
<hr>
<h4>
    {{ $post->title }}
</h4>
<p>
    {{ $post->description }}
</p>
