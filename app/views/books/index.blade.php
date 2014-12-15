@extends('layouts.main')

@section('content')

<div class="blue">Books Project
    <div class="include">@include('nav')</div>
</div>

<div class="green">My list of books ({{ $authUser->name }})
    <div class="greenLinks">
        {{ link_to("books/create", 'add new book') }}
        {{ link_to("books/public", 'Public books') }}

    </div>
</div>
<div class="info">
    <div class="small_boxgreen"></div>
    <div class="d">book is public</div>
</div>
<div class="wra">

   @if($value->count())
        @foreach($value as $val)


    <div class="wrapperBook">
        <div id="books_pic">
            <img class= "indexSize"
            {{HTML::image("$val->picture","pic")}}>
        </div>
        <div id="books_details">
            <div class="publicCheked">
                @if($val->is_public == 'public')
                <div class="small_boxgreen"></div>
                @else
                <div class="small_box"></div>
                @endif
            </div>
            <div class="booksDet">
                title: {{$val->title}}
                <br>
                author: {{$val->author}}
                <br>

            </div>

            <div class="link">
                {{ link_to("books/$val->ub_id", 'more details') }}
            </div>
        </div>

        <div class="cb"></div>

    </div>

         @endforeach
   @else

    <p> You didn't read any books yet!</p>

    @endif
</div>

@stop

