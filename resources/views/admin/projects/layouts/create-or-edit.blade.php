@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h2 class="mb-3">@yield('page-title')</h2>
            <form action="@yield('form-action')" method="POST" enctype="multipart/form-data">
                @yield('form-method')
                @csrf

                @if ($errors->any())
                    <div class="mb-3">
                        <ul class="alert alert-danger ps-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title)}}">
                </div>

                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}"
                                {{ ($type->id == old('type_id', $project->type_id)) ? "selected" : "" }}
                                >{{ $type->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    @foreach ($technologies as $technology)
                        @if($errors->any())
                            <input type="checkbox" class="btn-check" id="check-{{ $technology->id }}" name="technologies[]" value="{{ $technology->id }}" autocomplete="off"
                                {{ in_array($technology->id, old('technologies', [])) ? "checked" : '' }}
                            >
                        @else
                            <input type="checkbox" class="btn-check" id="check-{{ $technology->id }}" name="technologies[]" value="{{ $technology->id }}" autocomplete="off"
                            {{ $project->technologies->contains($technology) ? "checked" : '' }}
                            >
                        @endif
                        <label class="btn btn-outline-primary" for="check-{{ $technology->id }}">{{ $technology->name }}</label>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="prog_langs">Progamming languages used:</label>
                    <input type="text" name="prog_langs" id="prog_langs" class="form-control" value="{{ old('prog_langs', $project->prog_langs)}}">
                </div>

                <div class="mb-3">
                    <label for="due_to">Due to:</label>
                    <input type="datetime-local" name="due_to" id="due_to" class="form-control" value="{{ old('due_to', $project->due_to)}}">
                </div>

                <div class="mb-3">
                    <label for="url">Image: </label>
                    <input type="file" name="url" id="url" class="form-control" value="{{ old('url', $project->url)}}">
                </div>

                <input type="submit" value="@yield('page-title')" class="btn btn-primary me-2">
                <input type="reset" value="Reset" class="btn btn-warning">
            </form>
        </div>
    </div>
</div>
@endsection
