<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UbahPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UbahPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return inertia('Admin.UbahPassword.Edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UbahPasswordRequest $request)
    {
        try {
            $validated = $request->validated();
            $pass = bcrypt($validated['password']);
            auth()->user()->password = $pass;

            $user = User::findOrFail(auth()->user()->id);
            $user->password = $pass;
            $user->save();

            return redirect(url('/admin/ubah-password'))
                ->with([
                    'success' => [
                        'title' => 'Success!',
                        'text' => 'Password has been edited.',
                    ]
                ]);
        } catch (\Throwable $th) {
            return redirect(url('/admin/ubah-password'))
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
        //
    }
}
