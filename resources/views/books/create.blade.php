@extends('books.base')

@section('content')
<div class="container">
<form action="{{route('save_book')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-lg-8 col-md-6 col-sm-4">

  <div class="mb-3">
    <label for="isbn" class="form-label">Isbn</label>
    <input type="text" class="form-control" name="isbn" id="isbn" placeholder="isbn">
  </div>

  <div class="mb-3">
  <div class="form-floating">
    <textarea class="form-control" placeholder="Basic idea..." name="basic_idea" id="basic_idea"></textarea>
    <label for="basic_idea">Basic idea</label>
  </div>
</div>
  <div class="mb-3">
    <label for="author" class="form-label">Author</label>
    <input type="text" class="form-control" name="author" id="author" placeholder="author">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" name="price" id="price" placeholder="price">
  </div>
  <div class="mb-3">
    <label for="publication_year" class="form-label">Publication year</label>
    <input type="text" class="form-control" name="publication_year" id="publication_year" placeholder="Publication year">
  </div>
 
  <div class="mb-3">
    <label for="categorie" class="form-label">Category</label>
    <select class="form-select" name="categorie" id="categorie" aria-label="Default select example">
      <option selected disabled>Choose a category</option>
      <option value="romantic">Romantic</option>
      <option value="political">Political</option>
      <option value="horror">Horror</option>
      <option value="business">Business</option>
      <option value="comedic">Comedic</option>
      <option value="adventure">Adventure</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="book" class="form-label">Upload a book</label>
    <input class="form-control" type="file" id="book" name="book">
  </div>
  

  <div class="mb-3">
    <input type="submit" class="form-control btn btn-primary" />
  </div>
</div>
</div>
</form>
</div>
@endsection
