<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Book;
use App\Models\Content;
use App\Models\Publisher;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $welcome = Content::where('judul', 'like', '%selamat datang%')
            ->limit(1)
            ->get(['judul', 'isi']);

        $books = Book::addSelect(['penerbit' => Publisher::select('penerbit')
            ->whereColumn('publishers.id', 'publisher_id')
            ->limit(1)
        ])->limit(6)->orderByDesc('id')->get();
        $blogs = Blog::addSelect(['kategori' => BlogCategory::select('kategori_blog')
            ->whereColumn('blog_categories.id', 'blog_category_id')
            ->limit(1)
        ])->limit(4)->orderByDesc('tanggal')->get();

        return inertia('User.Home', [
            'welcome' => $welcome[0],
            'books' => $books,
            'blogs' => $blogs
        ]);
    }
}
