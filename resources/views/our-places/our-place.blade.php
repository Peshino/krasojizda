{{-- <div class="our-place" style="border-bottom: 1px solid {{ $ourPlace->user->color->hex_code }};">
<h3 class="our-place-title">
    <a href="{{ route('our-places.show', $ourPlace->id) }}">
        {{ $ourPlace->title }}
    </a>
</h3>
</div>
<p class="our-place-meta text-right unimportant-text">
    <small>{{ $ourPlace->updated_at->isoFormat('D. MMMM YYYY H:mm') }}</small>
</p> --}}

<h3 class="our-place-title">
    Evropa
</h3>

<div class="mt-3">
    <img class="img-fluid" src="{{ asset('img/europe.png') }}" alt="Evropa">
</div>