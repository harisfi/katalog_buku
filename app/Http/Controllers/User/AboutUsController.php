<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Content;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = Content::where('judul', 'like', '%About Us%')
            ->limit(1)
            ->get(['judul', 'isi']);
        return inertia('User.About', [
            'about' => $about[0]
        ]);
    }
}
