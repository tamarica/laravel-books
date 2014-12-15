<?php

class BooksController extends BaseController
{
    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('index')));
    }

    public function index()
    {
        if (Auth::check()) {

            $authUser = Auth::user();
            $value = Book::
                join('user_book', 'book.b_id', '=', 'user_book.book_id')
                ->select('ub_id', 'b_id', 'author', 'title', 'user_id', 'book_id', 'rank', 'comments', 'picture', 'is_public')
                ->where('user_id', '=', $authUser->id)
                ->get();
            return View::make('books.index', array('authUser' => $authUser, 'value' => $value));
        } else {

            return Redirect::to('login');
        }
    }

    public function show($id)
    {
        $value = Book::
            join('user_book', 'book.b_id', '=', 'user_book.book_id')
            ->select('ub_id', 'b_id', 'author', 'title', 'user_id', 'book_id', 'rank', 'comments', 'picture', 'is_public')
            ->where('user_book.ub_id', '=', $id)
            ->get();

        $authUser = Auth::user();
        foreach ($value as $val) {
            if ($authUser->id == $val->user_id) {

                return View::make('books.show', array('value' => $value));
            } else {
                return Redirect::to('books');
            }
        }


    }

    public function showPublic()
    {
        $arrayName = array();
        $value = Book::

            join('user_book', 'book.b_id', '=', 'user_book.book_id')
            ->join('user', 'user.id', '=', 'user_book.user_id')
            ->select('ub_id', 'b_id', 'author', 'title', 'user_id', 'book_id', 'rank', 'comments', 'picture'
                , 'name', 'email', 'is_public')
            ->WHERE('user_book.is_public', '=', 'public')
            ->orderBY('user_id')->get();

        $value2 = User::all();

        $value3 = Book::

            join('user_book', 'book.b_id', '=', 'user_book.book_id')
            ->join('user', 'user.id', '=', 'user_book.user_id')
            ->select('ub_id', 'b_id', 'author', 'title', 'user_id', 'book_id', 'rank', 'comments', 'picture'
                , 'name', 'email', 'is_public')
            ->WHERE('user_book.is_public', '=', 'public')
            ->groupBY('user_id')->get();

        foreach ($value3 as $val3) {
            foreach ($value2 as $val2) {
                if ($val2->name == $val3->name) {
                    $arrayName[] = $val3->name;
                }
            }
        }

        return View::make('books.public', array('value' => $value, 'arrayName' => $arrayName));
    }


    public function edit($id)
    {

        $authUser = Auth::user();
        $value = Book::
            join('user_book', 'book.b_id', '=', 'user_book.book_id')
            ->select('ub_id', 'b_id', 'author', 'title', 'user_id', 'book_id', 'rank', 'comments', 'picture', 'is_public')
            ->where('user_book.ub_id', '=', $id)
            ->get();

        foreach ($value as $val) {
            if ($authUser->id == $val->user_id) {

                return View::make('books.edit', array('book' => $value, 'authUser' => $authUser));
            } else {
                return Redirect::to('books');
            }
        }
    }

    public function update($id)
    {
        $validation = Validator::make(Input::all(), Book::$rules);

        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }

        $bookDetails = Book::
            where('author', '=', Input::get('author'))
            ->where('title', '=', Input::get('title'))->first();


        if ($bookDetails) {
            $book_id = $bookDetails->b_id;
        } else {
            $Id = Book::insertGetId(
                array('title' => Input::get('title'),
                    'author' => Input::get('author'),
                    'picture' => Input::get('picture')
                )
            );


            $book_id = $Id;

        }

        $authUser = Auth::user();

        UsersBook::where('ub_id', $id)->update(
            array('user_id' => $authUser->id,
                'book_id' => $book_id,
                'rank' => Input::get('rank'),
                'comments' => Input::get('comments'),
                'is_public' => Input::get('is_public')
            )
        );

        return Redirect::to('books');


    }

    public function destroy($id)
    {

        UsersBook::
        where('ub_id', $id)->delete();
        return 'ok';

    }

    public function create()
    {
        return View::make('books.create');
    }

    public function store()
    {

        $validation = Validator::make(Input::all(), Book::$rules);

        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }

        $bookDetails = Book::
            where('author', '=', Input::get('author'))
            ->where('title', '=', Input::get('title'))->first();


        if ($bookDetails) {
            $book_id = $bookDetails->b_id;
        } else {

            $id = Book::insertGetId(
                array('title' => Input::get('title'),
                    'author' => Input::get('author'),
                    'picture' => Input::get('picture')
                )
            );

            $book_id = $id;
        }

        $authUser = Auth::user();

        UsersBook::insert(
            array('user_id' => $authUser->id,
                'book_id' => $book_id,
                'rank' => Input::get('rank'),
                'comments' => Input::get('comments'),
                'is_public' => Input::get('is_public')
            )
        );
        return Redirect::to('books');

    }
}