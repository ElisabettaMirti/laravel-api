@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">

            <h1>
                Title: {{ $project->title }}
            </h1>
            <h2># {{ $project->id }}</h2>
            <h2 style="background: {{$project->type->color}}" class="d-inline-block p-2 rounded">{{ $project->type->name }}</h2>
            <h3>Programming language: {{ $project->prog_langs }}</h3>
            <h3> Technologies:
                @forelse ($project->technologies as $technology )
                    <span class="badge rounded-pill" style="background-color: {{ $technology->color }}">{{ $technology->name }}</span>
                @empty
                    <p>no techonologies</p>
                @endforelse
            </h3>
            <h4>Due to: {{ $project->due_to }}</h4>
            @if ( str_starts_with($project->url, "http"))
                <img src="{{ $project->url }}" alt="{{ $project->title }}">
            @else
                <img src="{{ asset('storage/' . $project->url) }}" alt="{{ $project->title }}">
            @endif


        </div>
    </div>
</div>
@endsection
