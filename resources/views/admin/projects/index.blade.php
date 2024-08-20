@extends('layouts.admin')

@section('page-title')
    Project List
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="col-12 text-center mb-4 p-4">
            Project List
        </h1>
        <table class="table table-light table-hover table-striped col-8">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Programming Languages</th>
                    <th scope="col">Technologies</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            @foreach ($projects as $project)
                <tbody>
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->type->name }}</td>
                        <td>{{ $project->prog_langs }}</td>

                        <td>
                            @forelse ($project->technologies as $technology )
                                <span class="badge rounded-pill" style="background-color: {{ $technology->color }}">{{ $technology->name }}</span>
                            @empty
                                <p>no techonologies</p>
                            @endforelse
                        </td>

                        <td>
                            <a href="{{Route('admin.projects.show', $project)}}" class="btn btn-primary btn-sm me-2 ms-2">Show</a>
                            <a href="{{Route('admin.projects.edit', $project)}}" class="btn btn-light btn-sm me-2">Edit</a>
                            <form action="{{Route('admin.projects.destroy', $project)}}" method="POST" class="d-inline-block">
                                @method("DELETE")
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{ $projects->links()}}
    </div>
</div>
@endsection
