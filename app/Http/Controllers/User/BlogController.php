<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with(['user:id,name', 'blogCategory:id,kategori_blog'])
            ->orderByDesc('tanggal')
            ->get();
        
        $blogCategories = BlogCategory::all('id', 'kategori_blog');
        $blogArchives = Blog::orderByDesc('tanggal')->get(['id', 'tanggal']);
        foreach ($blogArchives as $k => $v) {
            $blogArchives[$k]['tanggal'] = Carbon::parse($v['tanggal'])->format('F Y');
        }

        return inertia('User.Blog.Index', [
            'blogs' => $blogs,
            'blogCategories' => $blogCategories,
            'blogArchives' => $blogArchives
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
        $blog = Blog::with(['user:id,name', 'blogCategory:id,kategori_blog'])->findOrFail($id);
        $blogCategories = BlogCategory::all('id', 'kategori_blog');
        $blogArchives = Blog::orderByDesc('tanggal')->get(['id', 'tanggal']);
        foreach ($blogArchives as $k => $v) {
            $blogArchives[$k]['tanggal'] = Carbon::parse($v['tanggal'])->format('F Y');
        }

        return inertia('User.Blog.Show', [
            'blog' => $blog,
            'blogCategories' => $blogCategories,
            'blogArchives' => $blogArchives
        ]);
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
