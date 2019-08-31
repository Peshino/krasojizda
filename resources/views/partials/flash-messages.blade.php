<div class="flash-message mt-3">
    @foreach (['danger', 'warning', 'success', 'info'] as $message)
    @if (Session::has('flash_message_' . $message))
    <div class="alert alert-{{ $message }} alert-dismissible fade show text-center" role="alert">
        <i class="far fa-envelope-open align-middle"></i>&nbsp;&nbsp;
        <span class="align-middle">{{ Session::get('flash_message_' . $message) }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @endforeach
</div>
