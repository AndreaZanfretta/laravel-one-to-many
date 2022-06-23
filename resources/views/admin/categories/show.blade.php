@extends('layouts.back')

@section('content')
    <div class="categoryShow text-center my-5">
        <h1>{{$category->name}}</h1>
        <h2>Post pubbicati in questa categoria</h2>
        <ul>
            @foreach ($category->posts as $post)
                <li><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></li>
            @endforeach
        </ul>
    </div>
    
    
    
@endsection