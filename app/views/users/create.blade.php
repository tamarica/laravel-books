@extends('layouts.main')

@section('content')

<div class="blue">Create New User
    <div class="include">@include('nav')</div>
</div>

<div class="green"></div>

<div class="form">

    {{ Form::open(['route' => 'users.store']) }}

    @include('users.add_update_form')

    <div class="linkFormLogin">
        {{ Form::submit('Add User') }}
    </div>

</div>
{{ Form::close() }}
@stop