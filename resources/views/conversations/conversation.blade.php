<div class="conversation" style="border-bottom: 1px solid {{ $conversation->user->color->hex_code }};">
    <h3 class="conversation-title">
        <a href="{{ route('conversations.show', $conversation->id) }}">
            {{ $conversation->title }}
        </a>
    </h3>
</div>
<p class="conversation-meta text-right unimportant-text">
    <small>{{ $conversation->updated_at->isoFormat('D. MMMM YYYY H:mm') }}</small>
</p>