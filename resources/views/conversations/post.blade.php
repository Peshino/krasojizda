<div class="blog-post" style="border-bottom: 1px solid {{ $post->user->color->hex_code }};">
    <h3 class="blog-post-title">
        <a href="{{ route('posts.show', $post->id) }}">
            {{ $post->title }}
        </a>
    </h3>
</div>
<p class="blog-post-meta text-right unimportant-text">
    <small>{{ $post->updated_at->isoFormat('D. MMMM YYYY H:mm') }}</small>
</p>