@extends('layouts.back')

@section('content')
<form action="{{route('admin.posts.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="title" class="form-control @error('title') is-invalid @enderror"  id="title" name="title" placeholder="Inserisci Titolo" value="{{old('title')}}">
      @error('title')
            <div class="alert alert-danger">
                Titolo Non valido
            </div>
        @enderror
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"  cols="30" rows="10" placeholder="Inserisci Testo">{{old('content')}}</textarea>
      @error('content')
            <div class="alert alert-danger">
                Contenuto Non valido
            </div>
          @enderror
    </div>
    <div class="form-group">
      <label for="category">Categoria</label>
      <select name="category_id" id="category">
        <option selected hidden value="">Seleziona Categoria</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
      @error('category')
            <div class="alert alert-danger">
               Categoria Non valido
            </div>
          @enderror
    </div>
    <div class="form-check">
      <input type="checkbox" name="published" class="form-check-input" id="published">
      <label class="form-check-label" {{old('published') ? 'checked' : ''}}  for="published">Pubblicato?</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection