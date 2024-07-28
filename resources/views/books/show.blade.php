@extends('books.base')

@section('content')
<div class="container bg-dark text-light">
   title {{$book->book_title}}
  isbn  {{$book->isbn}}
       
<a href="#"></a>
</div>
-------
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-6 col-sm-4  bg-warning">
<ul class="list-group">
    <li class="list-group-item"> <strong> {{$book->book_title}} </strong> </li>
    <li class="list-group-item"> <strong class="text-primary"> Author: </strong> {{$book->author}}</li>
    <li class="list-group-item"><strong class="text-primary"> Basic idea: </strong> {{$book->basic_idea}}</li>
    <li class="list-group-item"> <strong class="text-primary"> Price: </strong> {{$book->price}}$</li>
    <li class="list-group-item"> <strong class="text-primary"> Category: </strong> {{$book->categorie}}</li>
    <li class="list-group-item"><strong class="text-primary">Publication year: </strong>{{$book->publication_year}}</li>
    <li class="list-group-item"><strong class="text-primary">Created at: </strong> {{$book->created_at}}</li>
    <li class="list-group-item"><strong class="text-primary">Updated at: </strong> {{$book->updated_at}}</li>
    
    <li class="list-group-item"><strong class="text-primary">
    @if($book->file_path)
    <a href="{{ route('books.download', ['filename' => basename($book->file_path)]) }}" class="btn btn-primary btn-sm">Télécharger</a>
    <a href="{{ route('books.view', ['filename' => basename($book->file_path)]) }}" class="btn btn-secondary btn-sm">Afficher</a>
    @else
    <p>Pas de PDF disponible pour ce livre.</p>
@endif
<li>
  </ul>
</div>
</div>
</div>
@endsection
