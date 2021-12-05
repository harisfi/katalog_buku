<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Tag;

class BookController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::with([
            'publisher:id,penerbit',
            'bookCategory:id,kategori_buku',
            'tag:id,tag'
        ])->findOrFail($id);
        $related = Book::where('book_category_id', $book['book_category_id'])->inRandomOrder(5)->get();
        $categories = BookCategory::orderBy('kategori_buku')->get();
        $tags = Tag::orderBy('tag')->get();

        return inertia('User.Book.Show', [
            'book' => $book,
            'related' => $related,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
}
