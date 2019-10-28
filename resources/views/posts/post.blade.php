<div class="blog-post" style="border-bottom: 1px solid {{ $post->user->color->hex_code }};">
    <h2 class="blog-post-title">
        <a href="{{ route('posts.show', $post->id) }}" style="color: {{ $post->user->color->hex_code }};">
            {{ $post->title }}
        </a>
    </h2>
</div>
<p class="blog-post-meta text-right">
    <small>{{ $post->updated_at->isoFormat('D. MMMM YYYY H:mm') }}</small>
</p>