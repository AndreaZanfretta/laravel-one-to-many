@extends('layouts.back')

@section('content')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title black" id="deleteModalLabel">Cancella la categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body black">
        Sei sicuro di voler eliminare la categoria con id: @{{categoryid}} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
        <button type="button" class="btn btn-danger" @@click="submitForm()">Cancella</button>
      </div>
    </div>
  </div>
</div>
<a href="{{route('admin.categories.create')}}" class="btn btn-primary">Crea nuova categoria</a>
@if(session()->has('message'))
<div class="alert alert-success">
   {{session()->get('message')}}
</div>
@endif
<table class="table tablecolor table-striped-columns">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Data Creazione</th>
        {{-- <th scope="col">Pubblicato</th> --}}
        <th scope="col">Modifica</th>
      </tr>
    </thead>
    @foreach ($categories as $category)
    <tbody>
        <tr>
          <th scope="row">{{$category->id}}</th>
          <td><a href="{{route('admin.categories.show', $category->id)}}">{{$category->name}}</a></td>
          <td>{{$category->created_at}}</td>
          <td><a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-success">Modifica</a>
            <form action="{{route('admin.categories.destroy', $category->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" @@click="openModal($event, {{$category->id}})" class="btn btn-danger delete">Cancella</button>
            </form>
            </td>
        </tr>
    @endforeach
  </table>
@endsection