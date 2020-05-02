<div class="conversation" style="border-bottom: 1px solid {{ $conversation->user->color->hex_code }};">
    <h3 class="conversation-title">
        <a href="{{ route('conversations.show', $conversation->id) }}">
            {{ $conversation->title }}
            @if ($conversation->seen_by_user_id === null && Auth::user()->id !== $conversation->user_id)
            <sup><span class="badge badge-color"
                    style="background-color: {{ Auth::user()->color->hex_code }};">@lang('messages.new')</span></sup>
            @endif
            @if ($conversation->unseen_comments_count !== 0)
            <sup><span class="badge badge-color"
                    style="background-color: {{ Auth::user()->color->hex_code }};">{{ $conversation->unseen_comments_count }}</span></sup>
            @endif
        </a>
    </h3>
</div>
<p class="conversation-meta text-right unimportant-text">
    <small>{{ $conversation->updated_at->isoFormat('D. MMMM YYYY H:mm') }}</small>
</p>