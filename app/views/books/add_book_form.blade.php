
<div class="title">
    {{ Form::label('title', 'Title: ') }}
    {{ Form::text('title') }}
    {{ $errors->first('title', '<span class="err">:message</span>') }}
</div>
<br/>
<div class="author">
    {{ Form::label('author', 'Author: ') }}
    {{ Form::text('author') }}
    {{ $errors->first('author', '<span class="err">:message</span>') }}
</div>
<br/>
<div>
    <div class="commentPic">
   * cant change book cover,unless u change author or title (when u choose to update)
    </div>

    choose the book cover:  {{ Form::select('picture', [
    'pictures/adorablePig.jpg' => 'adorablePig',
    'pictures/adventures.jpg' => 'adventures',
    'pictures/blaivumas.jpg' => 'blaivumas',
    'pictures/frankenstein.jpg' => 'frankenstein',
    'pictures/guyGodman.jpg' => 'guyGodman',
    'pictures/hentrich.jpg' => 'hentrich',
    'pictures/hobbit.jpg' => 'hobbit',
    'pictures/music.jpg' => 'music',
    'pictures/storm.jpg' => 'storm'
    ]
    ) }}
   
</div>
<br/>
<div class="rank">
    select rank: {{ Form::select('rank', [
    '*'=>'1','**'=>'2','***'=>'3','****'=>'4','*****'=>'5','******'=>'6',
    '*******'=>'7','********'=>'8','*********'=>'9','**********'=>'10'])}}

</div>
{{ Form::label('comments', 'comments: ') }}
<div>
       {{ Form::textarea('comments') }}
</div>
<br/>
<div class="publicFrame">you want your book to be public or not:
<div>
    public {{Form::radio('is_public', 'public')}}
    not public {{Form::radio('is_public', ' not public',true)}}

</div>
</div>

<br/>


