<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
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
            $tag = Tag::orderBy('tag')->paginate(5);
        } else {
            $tag = Tag::where('tag', 'like', '%' . $query . '%')
                ->orderBy('tag')
                ->paginate(5);
        }

        return inertia('Admin.Tag.Index', [
            'tag' => $tag,
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
        return inertia('Admin.Tag.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        try {
            $validated = $request->validated();
            Tag::create([
                'tag' => $validated['tag']
            ]);

            return redirect(url('/admin/master/tag'))->with(config('constants.msg.success.add'));
        } catch (\Exception $th) {
            return redirect(url('/admin/master/tag'))->with(config('constants.msg.error'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return inertia('Admin.Tag.Edit', [
            'tags' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $tag = Tag::findOrFail($id);
            $tag->tag = $validated['tag'];
            $tag->save();

            return redirect(url('/admin/master/tag'))->with(config('constants.msg.success.edit'));
        } catch (\Throwable $th) {
            return redirect(url('/admin/master/tag'))->with(config('constants.msg.error'));
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
            $tag = Tag::findOrFail($id);
            $tag->delete();

            return redirect(url('/admin/master/tag'))->with(config('constants.msg.success.delete'));
        } catch (\Throwable $th) {
            return redirect(url('/admin/master/tag'))->with(config('constants.msg.error'));
        }
    }
}
