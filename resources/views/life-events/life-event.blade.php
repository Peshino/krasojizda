<div class="life-event mt-2 mb-2">
    <a href="#" class="life-event-link" id="{{ $lifeEvent->id }}" data-toggle="modal" data-target="#modal-life-event">
        {{ $lifeEvent->date->isoFormat('D. MMMM') }} - {{ $lifeEvent->title }}
    </a>
</div>

<div class="modal fade" id="modal-life-event" tabindex="-1" role="dialog" aria-labelledby="modal-life-event-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <ul class="list-inline justify-content-center">
                        <li class="list-inline-item">
                            <a class="crud-button href-by-js" href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <form method="POST" action="{{ route('life-events.destroy', $lifeEvent->id) }}"
                                autocomplete="off">
                                @csrf
                                @method('DELETE')
                                <button class="crud-button" type="button" data-toggle="modal"
                                    data-target="#modal-life-event-delete"><i class="far fa-trash-alt"></i></button>

                                <div class="modal fade" id="modal-life-event-delete" tabindex="-1" role="dialog"
                                    aria-labelledby="modal-life-event-delete-title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal-life-event-delete-title">
                                                    @lang('messages.really_delete')
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">
                                                    @lang('messages.delete')
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function () {
        $('.life-event-link').click(function () {
            var url = '{{ route("life-events.edit", ":id") }}',
                id = this.id;
            url = url.replace(':id', id);
            $('.href-by-js').click(function (e) {
                e.preventDefault();
                window.location.href = url;
            });
        });
    });
</script>
@endsection