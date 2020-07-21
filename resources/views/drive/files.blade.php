@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ $user->name }}のファイル一覧</div>

                <div class="card-body">
                    @foreach ($user->files as $file)
                        <li>
                            <a href='storage/{{$file->path}}'>
                                {{$file->name}}
                            </a>
                        <form method="POST" action="files/{{$file->path}}">
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="submit" value="削除">
                        </form>
                        </li>
                                
                    @endforeach
                    <form action="files" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file">
                        <button type="submit">アップロード</button>
                    </form>
                    
                </div>
            </div>
        </div>
        
        
    </div>
</div>
    
@endsection