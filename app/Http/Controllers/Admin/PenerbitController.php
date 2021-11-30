<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PenerbitRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PenerbitController extends Controller
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
            $publisher = Publisher::orderBy('penerbit')->paginate(5);
        } else {
            $publisher = Publisher::where('penerbit', 'like', '%' . $query . '%')
                ->orderBy('penerbit')
                ->paginate(5);
        }

        return inertia('Admin.Penerbit.Index', [
            'publisher' => $publisher,
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
        return inertia('Admin.Penerbit.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenerbitRequest $request)
    {
        try {
            $validated = $request->validated();
            Publisher::create([
                'penerbit' => $validated['penerbit'],
                'alamat' => $validated['alamat'],
            ]);

            return redirect(url('/admin/master/penerbit'))
                ->with([
                    'success' => [
                        'title' => 'Success!',
                        'text' => 'An item has been added.',
                    ]
                ]);
        } catch (\Exception $th) {
            return redirect(url('/admin/master/penerbit'))
                ->with([
                    'error' => [
                        'title' => 'Oops...',
                        'text' => 'Something went wrong!'.$th,
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
        $publisher = Publisher::findOrFail($id);
        return inertia('Admin.Penerbit.Edit', [
            'publisher' => $publisher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenerbitRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $publisher = Publisher::findOrFail($id);
            $publisher->penerbit = $validated['penerbit'];
            $publisher->alamat = $validated['alamat'];
            $publisher->save();

            return redirect(url('/admin/master/penerbit'))
                ->with([
                    'success' => [
                        'title' => 'Success!',
                        'text' => 'An item has been edited.',
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/master/penerbit'))
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
            $publisher = Publisher::findOrFail($id);
            $publisher->delete();

            return redirect(url('/admin/master/penerbit'))
                ->with([
                    'success' => [
                        'title' => 'Deleted!',
                        'text' => 'An item has been deleted.',
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/master/penerbit'))
                ->with([
                    'error' => [
                        'title' => 'Oops...',
                        'text' => 'Something went wrong!',
                    ]
                ]);
        }
    }
}
