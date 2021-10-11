<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Validator;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $book = new Book;
        $books = Book::all();
        $authors = Author::all();
        $categories = $book->categories();
        return view('book.index', [
            'books' => $books, 
            'authors' => $authors,
            'categories' => $categories,
            'author_id' => $request->author_id ?? '0'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book;
        $authors = Author::orderBy('name')->get();
        $categories = $book->categories();
        return view('book.create', ['authors' => $authors,'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'book_title' => ['required','min:3','regex:/^([^0-9]*)$/'],
            'book_price' => ['required','numeric','gt:0'],

        ],
        [

        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $book = new Book;
        $book->price = $request->book_price;
       $book->isbn = $book->generateISBN();
       $book->title = $request->book_title;
       $book->category = $request->book_category;
       $book->author_id = $request->author_id;
       $book->save();
       return redirect()->route('book.index')
       ->with('success_message', 'Book successfully assigned.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = $book->categories();
        return view('book.edit', ['book' => $book, 'authors' => $authors,'categories' => $categories]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(),
        [
            'book_title' => ['required','min:3','regex:/^([^0-9]*)$/'],
            'book_price' => ['required','numeric','gt:0'],

        ],
        [

        ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        
        $book->price = $request->book_price;
        $book->title = $request->book_title;
        $book->category = $request->book_category;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')
        ->with('success_message', 'Book successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')
        ->with('success_message', 'Book successfully deleted.');
    }
}
