<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = [
            'foto' => auth()->user()->foto,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ];
        $foto = asset('storage/' . $profile['foto']);

        return inertia('Admin.Profil.Index', [
            'profile' => $profile,
            'foto' => $foto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = [
            'foto' => auth()->user()->foto,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ];
        return inertia('Admin.Profil.Edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'foto' => 'nullable|file|image',
                'name' => 'required',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore(auth()->user()->id)
                ]
            ]);

            $profile = User::findOrFail(auth()->user()->id);
            $profile->name = $validated['name'];
            $profile->email = $validated['email'];

            if ($request->file('foto') !== null) {
                $path = Storage::putFile('public/photos', $request->file('foto'));
                $path = Str::of($path)->remove('public/');
                $profile->foto = $path;
            }

            $profile->save();

            return redirect(url('/admin/profil'))->with(config('constants.msg.success.profile'));
        } catch (\Throwable $th) {
            return redirect(url('/admin/profil'))->with(config('constants.msg.error'));
        }
    }
}
