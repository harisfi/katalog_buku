<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KontenRequest;
use App\Models\Content;
use Illuminate\Http\Request;

class KontenController extends Controller
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
            $content = Content::orderBy('judul')->paginate(5);
        } else {
            $content = Content::where('judul', 'like', '%' . $query . '%')
                ->orderBy('judul')
                ->paginate(5);
        }

        return inertia('Admin.Konten.Index', [
            'content' => $content,
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
        return inertia('Admin.Konten.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KontenRequest $request)
    {
        try {
            $validated = $request->validated();
            Content::create([
                'judul' => $validated['judul'],
                'isi' => $validated['isi'],
                'tanggal' => now()->format('Y-m-d')
            ]);

            return redirect(url('/admin/konten'))
                ->with([
                    'success' => [
                        'title' => 'Success!',
                        'text' => 'An item has been added.',
                    ]
                ]);
        } catch (\Exception $th) {
            return redirect(url('/admin/konten'))
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
        $content = Content::findOrFail($id);
        return inertia('Admin.Konten.Show', [
            'content' => $content
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
        $content = Content::findOrFail($id);
        return inertia('Admin.Konten.Edit', [
            'content' => $content
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KontenRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $content = Content::findOrFail($id);
            $content->judul = $validated['judul'];
            $content->isi = $validated['isi'];
            $content->save();

            return redirect(url('/admin/konten'))
                ->with([
                    'success' => [
                        'title' => 'Success!',
                        'text' => 'An item has been edited.',
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/konten'))
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
            $content = Content::findOrFail($id);
            $content->delete();

            return redirect(url('/admin/konten'))
                ->with([
                    'success' => [
                        'title' => 'Deleted!',
                        'text' => 'An item has been deleted.',
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/konten'))
                ->with([
                    'error' => [
                        'title' => 'Oops...',
                        'text' => 'Something went wrong!',
                    ]
                ]);
        }
    }
}
