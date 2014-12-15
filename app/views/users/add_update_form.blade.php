
<div class="name">
    {{ Form::label('name', 'Name: ') }}
    {{ Form::text('name') }}
    {{ $errors->first('name', '<span class="err">:message</span>') }}
    </div>

<div class="pass">
    {{ Form::label('password', 'Password: ') }}
	{{ Form::password('password') }}
	{{ $errors->first('password', '<span class="err">:message</span>') }}
</div>

<div class="email">
	{{ Form::label('email', 'Email: ') }}
	{{ Form::text('email') }}
	{{ $errors->first('email', '<span class="err">:message</span>') }}
</div>

<div class="age">
	{{ Form::label('age', 'Age: ') }}
	{{ Form::text('age') }}
    {{ $errors->first('age', '<span class="err">:message</span>') }}
</div>