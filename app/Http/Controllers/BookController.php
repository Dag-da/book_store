<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function __construct()
    {
      $this->middleware(['auth'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('pages.home', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
        'title' => 'required|max:30|string',
        'author' => 'required|max:30|string',
        'price' => 'required|numeric',
        'pages' => 'required|integer',
        'description' => 'required|string',
        'image' => 'required|image|mimes:png,jpg,jpeg|max:2000',
      ]);
      $pathValidatedImage = $validated['image']->store('book-cover');

      Book::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'image' => $pathValidatedImage,
        'author' => $validated['author'],
        'pages' => $validated['pages'],
        'price' => $validated['price'],
        'created_at' => now(),
      ]);
  
      return redirect()
        ->route('home')
        ->with('status', "Le livre a bien été ajouté");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('pages.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('pages.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        if ($request->hasFile('image')) {
            Storage::delete($book->image);
            $book->image = $request->file('image')->store('img');
          }

        $request->validate([
        'title' => 'required|max:30|string',
        'author' => 'required|max:30|string',
        'price' => 'required|numeric',
        'pages' => 'required|integer',
        'description' => 'required|string',
        'image' => 'image|mimes:png,jpg,jpeg|max:2000',
        ]);
        

        Book::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $book->image,
        'author' => $request->author,
        'pages' => $request->pages,
        'price' => $request->price,
        'created_at' => now(),
        ]);
    
        return redirect()
        ->route('home')
        ->with('status', "Le livre a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()
          ->route('home')
          ->with('status', "Le livre a bien été supprimé");
    }
}
