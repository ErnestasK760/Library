<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Validator;

class AuthorController extends Controller
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
        $authors = Author::all();
        return view('author.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'author_name' => ['required', 'string', 'min:3', 'max:16', 'regex:/^([^0-9]*)$/'],
                'author_surname' => ['required', 'string', 'min:3', 'max:16', 'regex:/^([^0-9]*)$/'],
            ],
            []
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $author = new Author;
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;
        $author->save();
        return redirect()->route('author.index')
            ->with('success_message', 'Author successfully assigned.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'author_name' => ['required', 'string', 'min:3', 'max:16', 'regex:/^([^0-9]*)$/'],
                'author_surname' => ['required', 'string', 'min:3', 'max:16', 'regex:/^([^0-9]*)$/'],
            ],
            []
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $author->name = $request->author_name;
        $author->surname = $request->author_surname;
        $author->save();
        return redirect()->route('author.index')
            ->with('success_message', 'Author successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if ($author->authorBooks->count()) {
            return redirect()->route('author.index')
                ->with('info_message', 'There are some books assigned to this author, unable to delete.');
        }
        $author->delete();
        return redirect()->route('author.index')
            ->with('success_message', 'Author succesfully deleted.');
    }
}
