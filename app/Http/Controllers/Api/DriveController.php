<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\File;
use Illuminate\Support\Facades\Storage;

class DriveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function upload(Request $request)
    {
        $request->validate([
            'file'=> 'required|max:1000000'
        ]);
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

        return $file;
    }

    public function files(Request $requiest)
    {
        $user = Auth::user();
        //$user = User::findOrFail($userId)->first();
        //$files = $user->files();
        $files = $user->files;

        return $files;
    }

    public function delete(Request $request, $fileId)
    {
        $user = Auth::user();
        $file = $user->files->where('id', '=', $fileId)->first();
        $count = $file->delete();

        $path = $file->path;
        
        if(Storage::disk('public')->exists($path)){
            Storage::disk('local')->delete('backup/' . $path);
            Storage::disk('local')->move('public/' . $path, 'backup/' . $path);
        }
        return 'ok';
    }
}
