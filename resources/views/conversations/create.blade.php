@extends('layouts.master')

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                Vytvořit rozhovor
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content text-center">
            <div class="blog-main">
                <form method="POST" action="{{ route('conversations.store') }}">
                    @csrf
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="conversation-title">Titulek</label>
                            <input type="text" class="form-control" id="conversation-title" name="title"
                                value="{{ old('title') }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="conversation-body">Text</label>
                            <textarea class="form-control" rows="10" id="conversation-body" name="body"
                                required>{{ old('body') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Vytvoř rozhovor</button>
                    </div>

                    @include('partials.errors')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection