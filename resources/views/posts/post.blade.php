<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="{{ route('posts.show', $post->id) }}">
            {{ $post->title }}
        </a>
    </h2>
    <p class="blog-post-meta">
        {{ $post->user->firstname }} {{ $post->user->lastname }} on
        {{ $post->updated_at->toFormattedDateString() }}
    </p>

    {{ $post->body }}
</div>