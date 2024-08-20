@extends('admin.projects.layouts.create-or-edit')

@section('page-title')
    Add new project
@endsection

@section('form-action')
    {{Route('admin.projects.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection


