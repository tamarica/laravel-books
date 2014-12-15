<?php

class Book extends Eloquent  {



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'book';

    protected $fillable = array( 'author', 'title');

    public static $rules = array( 'author' => 'required|max:10', 'title' => 'required|max:10');



}
