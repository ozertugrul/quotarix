@extends('layouts.app')

@section('content')
    @foreach(active_sections() as $section)
        @includeIf('sections.' . $section)
    @endforeach
@endsection
