@extends('layouts.admin')

@section('page-title')
    Type List
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="col-12 text-center mb-4 p-4">
            Type List
        </h1>
        <table class="table table-light table-hover table-striped col-8">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>

            @foreach ($types as $type)
                <tbody>
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td><span class="badge rounded-pill" style="background-color: {{ $type->color }}">{{ $type->name }}</span></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
