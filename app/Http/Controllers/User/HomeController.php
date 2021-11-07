<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Publisher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wTitle = 'Selamat Datang!';
        $wContent = 'Cillum dolore aliqua ullamco commodo nisi aliquip do aliqua nulla. Culpa mollit ullamco occaecat occaecat eiusmod minim laborum eiusmod ad. Tempor magna dolore amet duis voluptate fugiat irure duis consectetur. Non do culpa consequat nulla cupidatat in fugiat est eu dolore. Eiusmod esse occaecat aliqua minim do et laboris labore ex magna nostrud et veniam. Ullamco laboris sunt ex eiusmod incididunt proident consequat.';

        $books = Book::addSelect(['penerbit' => Publisher::select('penerbit')
            ->whereColumn('publishers.id', 'publisher_id')
            ->limit(1)
        ])->limit(6)->orderByDesc('id')->get();
        $blogs = Blog::addSelect(['kategori' => BlogCategory::select('kategori_blog')
            ->whereColumn('blog_categories.id', 'blog_category_id')
            ->limit(1)
        ])->limit(4)->orderByDesc('tanggal')->get();
        $bookCategories = BookCategory::all('id', 'kategori_buku');

        return inertia('User.Home', [
            'wTitle' => $wTitle,
            'wContent' => $wContent,
            'books' => $books,
            'blogs' => $blogs,
            'bookCategories' => $bookCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
