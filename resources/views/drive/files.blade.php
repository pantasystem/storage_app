@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ファイル一覧</div>

                <div class="card-body">
                    
                    @if (empty($files))
                        <ul>
                            @foreach ($files as $file)
                            <li>
                                {{$file.path}}
                            </li>
                                
                            @endforeach
                        </ul>
                    @else
                        何もありません。
                    @endif
                    <form action="upload" method="POST" enctype="multipart/form-data">
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