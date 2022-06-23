@extends('layouts.back')
@dump($post);
@section('content')

    <h1>{{$post->title}}</h1>
    <p>{{$post->content}}</p>
    <p>{{$post->category->name}}</p>
    <h5>Pubblicato: {{$post->published ? 'si' : 'no'}}</h5>
@endsection