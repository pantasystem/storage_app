@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <ul>
            @foreach ($files as $file)
            <li>
                {{$file.path}}
            </li>
                
            @endforeach
        </ul>
    </div>
</div>
    
@endsection