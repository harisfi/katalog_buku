<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Tag;

class BookCategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = BookCategory::findOrFail($id);
        $books = Book::with(['publisher:id,penerbit'])->where('book_category_id', $id)->get();
        $categories = BookCategory::orderBy('kategori_buku')->get();
        $tags = Tag::orderBy('tag')->get();

        return inertia('User.BookCategory.Show', [
            'books' => $books,
            'category' => $category,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
}
