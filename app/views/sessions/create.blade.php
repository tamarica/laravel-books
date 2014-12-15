@extends('layouts.main')

@section('content')
<div class="blue">Books Project
    <div class="books"><img width="150px" height="150px"
        {{ HTML::image("pictures/bookmanager256x256.png", "Logo") }}
    </div>
</div>
<div class="green">
    <div class="log">Login</div>
</div>

{{ Form::open(['route' => 'sessions.store']) }}
<div class="login">

    <div class="email">
        {{ Form::label('email', 'Email: ') }}
        {{ Form::email('email','liron@gmail.com') }}
        {{ $errors->first('email', '<span class="err">:message</span>') }}
    </div>

    <div class="pass">
        {{ Form::label('password', 'Password: ') }}
        {{ Form::password('password','liron') }}
        {{ $errors->first('password', '<span class="err">:message</span>') }}
    </div>

    <div class="linkFormLogin">
        {{ Form::submit('Login') }}
    </div >
    <div class="newUser">
        {{ link_to('users/create', 'New User?') }}
    </div>
    {{ Form::close() }}

</div>

@stop