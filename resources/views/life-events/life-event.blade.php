<div class="life-event" style="border-bottom: 1px solid {{ $lifeEvent->user->color->hex_code }};">
    <h3 class="life-event-title">
        {{ $lifeEvent->date->isoFormat('YYYY') }}
    </h3>

    <div class="mt-3">
        <div class="life-event mt-4" style="border-bottom: 1px solid grey;">
            <p>
                {{ $lifeEvent->date->isoFormat('D. MMMM YYYY') }} - {{ $lifeEvent->title }}
            </p>
        </div>
    </div>
</div>