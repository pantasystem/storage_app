<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\File;

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

    public function upload($request)
    {
        if($request->isMethod('get')){
            return view('drive.upload')
        }
        $path = Storage::make('public')->putFile('drive', $request->file('file'));
        $file = Auth::user()->files()->create([
                'path' => $path
        ]);

        return redirect()->route('files');
    }

    public function files(Request $requiest)
    {
        $user = $request->user();
        $files = $user->files();

        $data = [
            'files' => $files,
        ];

        return view('drive.files', $data);
    }
}
