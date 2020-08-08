<div class="blog-post" style="border-bottom: 1px solid {{ $post->user->color->hex_code }};">
    <h3 class="blog-post-title">
        <a href="{{ route('posts.show', $post->id) }}">
            {{ $post->title }}
            @if ($post->seen_by_user_id === null && Auth::user()->id !== $post->user_id)
            <sup><span class="badge badge-color"
                    style="background-color: {{ Auth::user()->color->hex_code }};">@lang('messages.new')</span></sup>
            @endif
            @if ($post->unseen_comments_count !== 0)
            <sup><span class="badge badge-color"
                    style="background-color: {{ Auth::user()->color->hex_code }};">{{ $post->unseen_comments_count }}</span></sup>
            @endif
        </a>
    </h3>
</div>
<p class="blog-post-meta text-right unimportant-text">
    <small>{{ $post->created_at->isoFormat('D. MMMM YYYY H:mm') }}</small>
</p>