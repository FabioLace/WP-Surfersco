{{-- 
    Template Name: Template Flessibile
--}}

@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post());
        @include('components.flexible-blocks')
    @endwhile
@endsection