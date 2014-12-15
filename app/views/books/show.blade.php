@extends('layouts.main')

@section('content')

<div class="blue">Books Project
    <div class="include">@include('nav')</div>
</div>

<div class="green">
    <div class="greenLinks">
        {{ link_to("books/public", 'Public books') }}

    </div>
</div>

@foreach($value as $val)

<div class="book">
    <div id="book_pic">
        <img class= "showSize"
        {{HTML::image("$val->picture","pic")}}>
    </div>
    <div id="book_details">
        <div class="bookDet">
            <div>
                title: {{$val->title}}
            </div>
            <div>
                author: {{$val->author}}
            </div>
            rank: {{$val->rank}}
            <div>
                the book is: {{$val->is_public}}
            </div>
            comment:
        </div>

        <div class="comment">
            {{$val->comments}}
        </div>

        <div class="linkedit">
            {{ link_to("books/$val->ub_id/edit",'Edit')}}
        </div>


        <div class="linkFormShow" id="delete-event">
            {{ Form::button('Delete book') }}
            {{ Form::hidden('bookId', $val->ub_id, array('id'=>'del')) }}
            {{Form:: close()}}
        </div>


    </div>

    <div class="cb"></div>


    @endforeach

    @stop