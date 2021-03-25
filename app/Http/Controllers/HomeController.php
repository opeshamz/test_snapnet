<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = ($request->image->getClientOriginalName());
            if (auth()->user()->photo) {
                Storage::delete('/public/images/'.auth()->user()->photo);
            }
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['photo' => $filename]);
            return redirect()->back()->with('message', 'Image Uploaded');
        }

         return redirect()->back()->with('error', 'Image not Uploaded');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
