<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('q');
        if (empty($query)) {
            $blog = Blog::addSelect(['blog_category' => BlogCategory::select('kategori_blog')
                ->whereColumn('blog_category_id', 'blog_categories.id')
                ->limit(1)
            ])->orderBy('blog_category')->paginate(5);
        } else {
            $blog = Blog::where('judul', 'like', '%' . $query . '%')
                ->addSelect(['blog_category' => BlogCategory::select('kategori_blog')
                    ->whereColumn('blog_category_id', 'blog_categories.id')
                    ->limit(1)
                ])->orderBy('blog_category')->paginate(5);
        }

        return inertia('Admin.Blog.Index', [
            'blog' => $blog,
            'katakunci' => $query
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategories = BlogCategory::orderBy('kategori_blog')->get();
        return inertia('Admin.Blog.Create', [
            'blogCategories' => $blogCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        try {
            $validated = $request->validated();
            Blog::create([
                'judul' => $validated['judul'],
                'isi' => $validated['isi'],
                'tanggal' => now()->format('Y-m-d'),
                'user_id' => 1,
                'blog_category_id' => $validated['blog_category_id']
            ]);

            return redirect(url('/admin/blog'))->with(config('constants.msg.success.add'));
        } catch (\Exception $th) {
            return redirect(url('/admin/blog'))->with(config('constants.msg.error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::with([
            'user:id,name',
            'blogCategory:id,kategori_blog'
        ])->findOrFail($id);
        return inertia('Admin.Blog.Show', [
            'blog' => $blog
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
        $blog = Blog::findOrFail($id);
        $blogCategories = BlogCategory::orderBy('kategori_blog')->get();

        return inertia('Admin.Blog.Edit', [
            'blog' => $blog,
            'blogCategories' => $blogCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $blog = Blog::findOrFail($id);
            $blog->judul = $validated['judul'];
            $blog->isi = $validated['isi'];
            $blog->blog_category_id = $validated['blog_category_id'];
            $blog->save();

            return redirect(url('/admin/blog'))->with(config('constants.msg.success.edit'));
        } catch (\Throwable $th) {
            return redirect(url('/admin/blog'))->with(config('constants.msg.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();

            return redirect(url('/admin/blog'))->with(config('constants.msg.success.delete'));
        } catch (\Throwable $th) {
            return redirect(url('/admin/blog'))->with(config('constants.msg.error'));
        }
    }
}
