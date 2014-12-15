@extends('layouts.main')

@section('content')
<div class="blue">Edit user
    <div class="include">@include('nav')</div>
</div>

<div class="green"></div>


<div class="form">
@foreach($book as $book)

{{ Form::model($book, ['route' => ['books.update', $book->ub_id]]) }}
{{ Form::hidden('_method', 'PUT') }}

@include('books.add_book_form')

    <div class="linkForm">
    {{ Form::submit('Save book') }}
</div>
</div>
{{ Form::close() }}

@endforeach
@stop