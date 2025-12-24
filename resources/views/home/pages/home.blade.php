@extends('home.index')

@section('content')
    @include('home.sections.hero')
    @include('home.sections.stats')
    @include('home.sections.services')
    @include('home.sections.about')
    @include('home.sections.industrial_process')
    @include('home.sections.cta')
@endsection
