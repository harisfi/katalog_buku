<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UbahPasswordRequest;
use App\Models\User;

class UbahPasswordController extends Controller
{
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

            return redirect(url('/admin/ubah-password'))->with(config('constants.msg.success.password'));
        } catch (\Throwable $th) {
            return redirect(url('/admin/ubah-password'))->with(config('constants.msg.error'));
        }
    }
}
