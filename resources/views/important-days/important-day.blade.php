<div class="important-day m-1 border-bottom-grey">
    <a href="#" class="modal-link 
        @if ($importantDay->date < $criticalPeriod) critical-period @endif 
        @if ($importantDay->date > $criticalPeriod && $importantDay->date < $shortPeriod) short-period @endif 
        @if ($importantDay->date > $longPeriod) long-period @endif" id="{{ $importantDay->id }}" data-toggle="modal"
        data-target="#modal-important-day">
        <p class="smaller">{{ $importantDay->date->isoFormat('D. MMMM') }}
            @if ($importantDay->date->isoFormat('YYYY-MM-DD') !== $todayDate)
            - {{ $timeFromNow }}
            @endif
        </p>
        <p>{{ $importantDay->title }}</p>
    </a>
</div>

<div class="modal fade" id="modal-important-day" tabindex="-1" role="dialog" aria-labelledby="modal-important-day-title"
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
                            <form id="important-day-delete-form" method="POST"
                                action="{{ route('important-days.destroy', $importantDay->id) }}" autocomplete="off">
                                @csrf
                                @method('DELETE')
                                <button class="crud-button" type="button" data-toggle="modal"
                                    data-target="#modal-important-day-delete"><i class="far fa-trash-alt"></i></button>

                                <div class="modal fade" id="modal-important-day-delete" tabindex="-1" role="dialog"
                                    aria-labelledby="modal-important-day-delete-title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal-important-day-delete-title">
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
        $('.modal-link').click(function () {
            var urlEdit = '{{ route("important-days.edit", ":id") }}',
                urlDelete = '{{ route("important-days.destroy", ":id") }}',
                urlRedirect = '{{ route("important-days.index") }}',
                id = this.id;
                urlEdit = urlEdit.replace(':id', id);
                urlDelete = urlDelete.replace(':id', id);

            $('.href-by-js').click(function (e) {
                e.preventDefault();
                window.location.href = urlEdit;
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('form#important-day-delete-form').submit(function (e) {
                e.preventDefault();
                var form = $(this),
                    url = urlDelete;

                $.ajax({
                    type: 'DELETE',
                    url: url,
                    data: {
                    },
                    success: function (data) {
                        // let status = data.status;
                        window.location.href = urlRedirect;
                    },
                    error: function (errorMessage) {
                        $('.modal-title').html('Error: ' + errorMessage.responseJSON.message);
                    }
                });
            });
        });
    });
</script>
@endsection