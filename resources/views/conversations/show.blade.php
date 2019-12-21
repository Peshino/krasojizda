@extends('layouts.master')

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                Rozhovor
            </div>
            @can('manipulate', $conversation)
            <div class="col">
                <ul class="list-inline justify-content-end">
                    <li class="list-inline-item">
                        <a class="crud-button" href="{{ route('conversations.edit', $conversation->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <form method="POST" action="{{ route('conversations.destroy', $conversation->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="crud-button" type="button" data-toggle="modal"
                                data-target="#modal-conversation-delete"><i class="far fa-trash-alt"></i></button>

                            <div class="modal fade" id="modal-conversation-delete" tabindex="-1" role="dialog"
                                aria-labelledby="modal-conversation-delete-title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-conversation-delete-title">Opravdu smazat?
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Smazat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            @endcan
        </div>
    </div>

    <div class="card-body">
        <div class="content">
            <div class="blog-main">
                <h3 class="text-center" style="color: {{ $conversation->user->color->hex_code }};">
                    {{ $conversation->title }}
                </h3>

                <p class="text-justify">{{ $conversation->body }}</p>

                <hr />

                <div class="comments">
                    <ul class="list-group">
                        @foreach ($conversation->comments as $comment)
                        <div class="d-flex">
                            <li class="list-group-item w-90 {{ Auth::user()->id === $comment->user->id ? 'ml-auto' : '' }}"
                                style="border-bottom: 1px solid {{ $comment->user->color->hex_code }};">
                                {{ $comment->body }}
                            </li>
                        </div>
                        <span
                            class="text-right unimportant-text {{ Auth::user()->id === $comment->user->id ? '' : 'w-90' }}"><small>{{ $comment->created_at->isoFormat('D. MMMM YYYY H:mm') }}</small>
                        </span>
                        @endforeach
                    </ul>
                </div>

                <hr />

                <div class="card-block">
                    <form method="POST" action="{{ route('conversation-comments.store', $conversation->id) }}">
                        @csrf
                        <div class="form-group">
                            <div class="floating-label">
                                <label for="comment-body">Tvůj komentář</label>
                                <textarea class="form-control" rows="3" id="comment-body" name="body"
                                    required>{{ old('body') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Přidej komentář</button>
                        </div>
                    </form>
                    @include('partials.errors')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection