<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriBukuRequest;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
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
            $bookCategories = BookCategory::orderBy('kategori_buku')->paginate(5);
        } else {
            $bookCategories = BookCategory::where('kategori_buku', 'like', '%' . $query . '%')
                ->orderBy('kategori_buku')
                ->paginate(5);
        }

        return inertia('Admin.KategoriBuku.Index', [
            'bookCategories' => $bookCategories,
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
        return inertia('Admin.KategoriBuku.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriBukuRequest $request)
    {
        try {
            $validated = $request->validated();
            BookCategory::create([
                'kategori_buku' => $validated['kategori_buku']
            ]);

            return redirect(url('/admin/master/kategori-buku'))
                ->with([
                    'success' => [
                        'title' => 'Success!',
                        'text' => 'An item has been added.',
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/master/kategori-buku'))
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
        $bookCategory = BookCategory::findOrFail($id);
        return inertia('Admin.KategoriBuku.Edit', [
            'bookCategory' => $bookCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriBukuRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $bookCategory = BookCategory::findOrFail($id);
            $bookCategory->kategori_buku = $validated['kategori_buku'];
            $bookCategory->save();

            return redirect(url('/admin/master/kategori-buku'))
                ->with([
                    'success' => [
                        'title' => 'Success!',
                        'text' => $bookCategory,
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/master/kategori-buku'))
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
            $bookCategory = BookCategory::findOrFail($id);
            $bookCategory->delete();

            return redirect(url('/admin/master/kategori-buku'))
                ->with([
                    'success' => [
                        'title' => 'Deleted!',
                        'text' => 'An item has been deleted.',
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/master/kategori-buku'))
                ->with([
                    'error' => [
                        'title' => 'Oops...',
                        'text' => 'Something went wrong!',
                    ]
                ]);
        }
    }
}
