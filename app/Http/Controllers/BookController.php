<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['user', 'favoritedBy'])->latest()->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pdf_file' => 'required|mimes:pdf|max:10000',
        ]);

        $book = Book::create([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'pdf_path' => $request->file('pdf_file')->store('pdfs', 'public'),
            'user_id' => Auth::id()
        ]);

        return redirect()->route('books.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function favorite(Book $book)
    {
        Auth::user()->favorites()->syncWithoutDetaching([$book->id]);
        return back()->with('success', 'Livro adicionado aos favoritos!');
    }

    public function unfavorite(Book $book)
    {
        Auth::user()->favorites()->detach($book->id);
        return back()->with('success', 'Livro removido dos favoritos!');
    }
}