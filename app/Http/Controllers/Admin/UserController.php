<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
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
            $users = User::where('id', '!=', auth()->user()->id)
                ->orderByDesc('level')->orderBy('name')
                ->paginate(5);
        } else {
            $users = User::where([
                ['id', '!=', auth()->user()->id],
                ['name', 'like', '%' . $query . '%']
            ])->orderByDesc('level')->orderBy('name')->paginate(5);
        }

        return inertia('Admin.User.Index', [
            'users' => $users,
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
        return inertia('Admin.User.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddRequest $request)
    {
        try {
            $validated = $request->validated();
            $path = Storage::putFile('public/photos', $request->file('foto'));
            $path = Str::of($path)->remove('public/');

            User::create([
                'foto' => $path,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'username' => $validated['username'],
                'password' => bcrypt($validated['password']),
                'level' => $validated['level']
            ]);

            return redirect(url('/admin/user'))->with(config('constants.msg.success.add'));
        } catch (\Exception $th) {
            return redirect(url('/admin/user'))->with(config('constants.msg.error'));
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
        if ($id == auth()->user()->id) {
            return abort(404);
        }
        $user = User::findOrFail($id);
        $foto = asset('storage/' . $user['foto']);

        return inertia('Admin.User.Show', [
            'user' => $user,
            'foto' => $foto
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
        if ($id == auth()->user()->id) {
            return abort(404);
        }
        $user = User::findOrFail($id);
        return inertia('Admin.User.Edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        if ($id == auth()->user()->id) {
            return abort(404);
        }
        try {
            $validated = $request->validated();

            $user = User::findOrFail($id);
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->username = $validated['username'];

            if ($validated['password'] != null) {
                $user->password = bcrypt($validated['password']);
            }

            if ($request->file('foto') !== null) {
                $path = Storage::putFile('public/photos', $request->file('foto'));
                $path = Str::of($path)->remove('public/');
                $user->foto = $path;
            }

            $user->level = $validated['level'];
            $user->save();

            return redirect(url('/admin/user'))->with(config('constants.msg.success.edit'));
        } catch (\Throwable $th) {
            return redirect(url('/admin/user'))->with(config('constants.msg.error'));
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
        if ($id == auth()->user()->id) {
            return abort(404);
        }
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect(url('/admin/user'))->with(config('constants.msg.success.delete'));
        } catch (\Exception $th) {
            return redirect(url('/admin/user'))->with(config('constants.msg.error'));
        }
    }
}
