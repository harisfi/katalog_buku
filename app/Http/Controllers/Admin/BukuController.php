<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BukuRequest;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Publisher;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BukuController extends Controller
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
            $books = Book::with([
                'publisher:id,penerbit'
            ])->addSelect(['book_category' => BookCategory::select('kategori_buku')
                ->whereColumn('book_category_id', 'book_categories.id')
                ->limit(1)
            ])->orderBy('book_category')
                ->paginate(5);
        } else {
            $books = Book::with([
                'publisher:id,penerbit'
            ])->addSelect(['book_category' => BookCategory::select('kategori_buku')
                ->whereColumn('book_category_id', 'book_categories.id')
                ->limit(1)
            ])->where('judul', 'like', '%' . $query . '%')
                ->orderBy('book_category')
                ->paginate(5);
        }

        return inertia('Admin.Buku.Index', [
            'books' => $books,
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
        $bookCategories = BookCategory::orderBy('kategori_buku')->get();
        $publishers = Publisher::orderBy('penerbit')->get();
        $tags = Tag::orderBy('tag')->get();

        return inertia('Admin.Buku.Create', [
            'bookCategories' => $bookCategories,
            'publishers' => $publishers,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
    {
        try {
            $validated = $request->validated();
            $path = Storage::putFile('public/covers', $request->file('cover'));
            $path = Str::of($path)->remove('public/');

            $book = Book::create([
                'judul' => $validated['judul'],
                'pengarang' => $validated['pengarang'],
                'tahun_terbit' => $validated['tahun_terbit'],
                'sinopsis' => $validated['sinopsis'],
                'cover' => $path,
                'publisher_id' => $validated['publisher_id'],
                'book_category_id' => $validated['book_category_id']
            ]);
            
            $book->tag()->attach($validated['tags']);

            return redirect(url('/admin/buku'))
                ->with([
                    'success' => [
                        'title' => 'Success!',
                        'text' => 'An item has been added.',
                    ]
                ]);
        } catch (\Exception $th) {
            return redirect(url('/admin/buku'))
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
        $book = Book::with([
            'bookCategory:id,kategori_buku',
            'publisher:id,penerbit',
            'tag:id,tag'
        ])->findOrFail($id);
        $cover = asset('storage/' . $book['cover']);

        return inertia('Admin.Buku.Show', [
            'book' => $book,
            'cover' => $cover
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
        $book = Book::with('tag:id')->findOrFail($id);

        $bookCategories = BookCategory::orderBy('kategori_buku')->get();
        $publishers = Publisher::orderBy('penerbit')->get();
        $tags = Tag::orderBy('tag')->get();

        $bookTagsTmp = [];
        foreach ($book['tag'] as $row) {
            $bookTagsTmp[] = $row['id'];
        }
        $book['tags'] = $bookTagsTmp;

        return inertia('Admin.Buku.Edit', [
            'book' => $book,
            'bookCategories' => $bookCategories,
            'publishers' => $publishers,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuRequest $request, $id)
    {
        try {
            $validated = $request->validated();

            $book = Book::findOrFail($id);
            $book->judul = $validated['judul'];
            $book->pengarang = $validated['pengarang'];
            $book->tahun_terbit = $validated['tahun_terbit'];
            $book->sinopsis = $validated['sinopsis'];

            if ($request->file('cover') !== null) {
                $path = Storage::putFile('public/covers', $request->file('cover'));
                $path = Str::of($path)->remove('public/');
                $book->cover = $path;
            }

            $book->publisher_id = $validated['publisher_id'];
            $book->book_category_id = $validated['book_category_id'];
            $book->save();

            $book->tag()->detach();
            $book->tag()->attach($validated['tags']);

            return redirect(url('/admin/buku'))
                ->with([
                    'success' => [
                        'title' => 'Success!',
                        'text' => 'An item has been edited.',
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/buku'))
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
            $book = Book::findOrFail($id);
            $book->tag()->detach();
            $book->delete();

            return redirect(url('/admin/buku'))
                ->with([
                    'success' => [
                        'title' => 'Deleted!',
                        'text' => 'An item has been deleted.',
                    ]
                ]);
        } catch (\Exception $th) {
            return redirect(url('/admin/buku'))
                ->with([
                    'error' => [
                        'title' => 'Oops...',
                        'text' => 'Something went wrong!'.$th,
                    ]
                ]);
        }
    }
}
