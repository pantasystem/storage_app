<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
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

    public function upload(Request $request)
    {
        if($request->isMethod('get')){
            return view('drive.upload');
        }
        $f = $request->file('file');
        $path = Storage::disk('public')->putFile('drive', $f);
        $size = Storage::disk('public')->size($path);
        $file = Auth::user()->files()->create([
                'path' => $path,
                'name' => $f->getClientOriginalName(),
                'size' => $size,
        ]);

        return redirect()->route('files');
    }

    public function files(Request $requiest)
    {
        $user = Auth::user();
        $files = $user->files()->get();

        $data = [
            'files' => $files,
        ];

        return view('drive.files', $data);
    }
}
