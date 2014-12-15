<?php

class UsersBook extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_book';

    protected $fillable = array( 'user_id', 'book_id', 'rank','comments','is_public');

    public static $rules = array( 'rank' => 'required', 'comments' => 'required', 'is_public' => 'required');



}
