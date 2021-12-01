<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriBlogRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class KategoriBlogController extends Controller
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
            $blogCategories = BlogCategory::orderBy('kategori_blog')->paginate(5);
        } else {
            $blogCategories = BlogCategory::where('kategori_blog', 'like', '%' . $query . '%')
                ->orderBy('kategori_blog')
                ->paginate(5);
        }

        return inertia('Admin.KategoriBlog.Index', [
            'blogCategories' => $blogCategories,
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
        return inertia('Admin.KategoriBlog.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriBlogRequest $request)
    {
        try {
            $validated = $request->validated();
            BlogCategory::create([
                'kategori_blog' => $validated['kategori_blog']
            ]);

            return redirect(url('/admin/master/kategori-blog'))
                ->with([
                    'success' => [
                        'title' => 'Success!',
                        'text' => 'An item has been added.',
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/master/kategori-blog'))
                ->with([
                    'error' => [
                        'title' => 'Oops...',
                        'text' => 'Something went wrong!',
                    ]
                ]);
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
        $blogCategory = BlogCategory::findOrFail($id);
        return inertia('Admin.KategoriBlog.Edit', [
            'blogCategory' => $blogCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriBlogRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $blogCategory = BlogCategory::findOrFail($id);
            $blogCategory->kategori_blog = $validated['kategori_blog'];
            $blogCategory->save();

            return redirect(url('/admin/master/kategori-blog'))
                ->with([
                    'success' => [
                        'title' => 'Success!',
                        'text' => 'An item has been edited.',
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/master/kategori-blog'))
                ->with([
                    'error' => [
                        'title' => 'Oops...',
                        'text' => 'Something went wrong!',
                    ]
                ]);
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
            $blogCategory = BlogCategory::findOrFail($id);
            $blogCategory->delete();

            return redirect(url('/admin/master/kategori-blog'))
                ->with([
                    'success' => [
                        'title' => 'Deleted!',
                        'text' => 'An item has been deleted.',
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/master/kategori-blog'))
                ->with([
                    'error' => [
                        'title' => 'Oops...',
                        'text' => 'Something went wrong!',
                    ]
                ]);
        }
    }
}
