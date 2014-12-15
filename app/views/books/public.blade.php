@extends('layouts.main')

@section('content')
<div class="blue">Books Project
    <div class="include">@include('nav')</div>
</div>
<div class="green">
    <div class="log">Public books</div>
</div>

<div class="wra">
    @foreach ($arrayName as $arrName)
         <div class="bold">books of: {{$arrName}}</div>
         @foreach ($value as $val)
    @if($arrName == $val->name)



    <div class="wrapperBook">
        <div id="booksPublic_pic">
            <img class ="publicSize"
            {{HTML::image("$val->picture","pic")}}>
        </div>
        <div id="booksPublic_details">
            <div class="booksPublic">
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
                </div>
                <div class="comments">
                comment:

            <div class="comment">
                {{$val->comments}}
            </div >
            </div>
           <div class = "linkEdit">

                {{ link_to("books/$val->ub_id/edit",'Edit')}}
            </div>
            </div>
        </div>

        <div class="cb"></div>

@endif
@endforeach
    @endforeach
</div>
@stop

