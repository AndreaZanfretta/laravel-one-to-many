@extends('layouts.back')
@dump($category);
@section('content')
    <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="title">Titolo</label>
        <input type="title" class="form-control" id="title" name="title" placeholder="Inserisci Titolo" value="{{$post->title}}">
        </div>
        <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content"  cols="30" rows="10" placeholder="Inserisci Testo">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Categoria</label>
            <select name="category_id" id="category">
              @foreach ($category as $cat)
              <option value="{{$cat->id}}">{{$cat->name}}</option>
              @endforeach
            </select>
          </div>
        <div class="form-check">
        <input type="checkbox" name="published" class="form-check-input" id="published">
        <label class="form-check-label" {{old('published') ? 'checked' : ''}}  for="published">Pubblicato?</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection