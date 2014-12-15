@extends('layouts.main')

@section('content')

<div class="blue">Create New book
    <div class="include">@include('nav')</div>
</div>

<div class="green"></div>

<div class="form">

    {{ Form::open(['route' => 'books.store']) }}

    @include('books.add_book_form')

    <div class="linkForm">
        {{ Form::submit('Add book') }}
    </div>
</div>
{{ Form::close() }}
@stop