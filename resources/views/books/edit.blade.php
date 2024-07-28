@extends('books.base')

@section('content')
<div class="container">
<form action="{{route('update_book',['id'=>$book->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-lg-8 col-md-6 col-sm-4">

  <div class="mb-3">
    <label for="isbn" class="form-label">Isbn</label>
    <input value="{{$book->isbn}}" type="text" class="form-control" name="isbn" id="isbn" placeholder="isbn">
  </div>

  <div class="mb-3">
  <div class="form-floating">
    <textarea class="form-control" placeholder="Basic idea..." name="basic_idea" id="basic_idea">{{$book->basic_idea}}</textarea>
    <label for="basic_idea">Basic idea</label>
  </div>
</div>
  <div class="mb-3">
    <label for="author" class="form-label">Author</label>
    <input  value="{{$book->author}}" type="text" class="form-control" name="author" id="author" placeholder="author">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input  value="{{$book->price}}" type="number" class="form-control" name="price" id="price" placeholder="price">
  </div>
  <div class="mb-3">
    <label for="publication_year" class="form-label">Publication year</label>
    <input value="{{$book->publication_year}}" type="text" class="form-control" name="publication_year" id="publication_year" placeholder="Publication year">
  </div>
 
  <div class="mb-3">
    <label for="categorie" class="form-label">Category</label>
    <select class="form-select" name="categorie" id="categorie" aria-label="Default select example">
        <option disabled>Choose a category</option>
        <option value="romantic" {{ old('categorie', $book->categorie) == 'romantic' ? 'selected' : '' }}>Romantic</option>
        <option value="political" {{ old('categorie', $book->categorie) == 'political' ? 'selected' : '' }}>Political</option>
        <option value="horror" {{ old('categorie', $book->categorie) == 'horror' ? 'selected' : '' }}>Horror</option>
        <option value="business" {{ old('categorie', $book->categorie) == 'business' ? 'selected' : '' }}>Business</option>
        <option value="comedic" {{ old('categorie', $book->categorie) == 'comedic' ? 'selected' : '' }}>Comedic</option>
        <option value="adventure" {{ old('categorie', $book->categorie) == 'adventure' ? 'selected' : '' }}>Adventure</option>
    </select>
    <small class="text-warning">{{$book->categorie}}</small>
  </div>
  <div class="mb-3">
    <label for="book" class="form-label">Upload a book</label>
    <input class="form-control" type="file" id="book" name="book">
    <small class="text-warning">{{$book->book_title}}</small>

  </div>
  

  <div class="mb-3">
    <input type="submit" class="form-control btn btn-primary" />
  </div>
</div>
</div>
</form>
</div>
@endsection
