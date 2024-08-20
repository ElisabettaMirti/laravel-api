@extends('admin.projects.layouts.create-or-edit')

@section('page-title')
    Edit {{ $project->title }}
@endsection

@section('form-action')
    {{Route('admin.projects.update', $project) }}
@endsection

@section('form-method')
    @method('PUT')
@endsection
