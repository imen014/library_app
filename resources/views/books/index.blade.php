@extends('books.base')

@section('content')
<div class="container bg-dark text-light">
    @foreach ($books as $book)
    <div class="container">
        <div class="card">
            <div class="card-body">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   <strong class="text-danger">Book title</strong> 
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>    {{$book->book_title}} </strong>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   <strong class="text-success">Isbn</strong>   
              </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>{{$book->isbn}}</strong> 
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                   <strong class="text-primary">Author</strong>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <strong> {{$book->author}}  </strong>
                </div>
              </div>
            </div>
        </div>
        </div>
        </div>
          </div>

          <a class="btn btn-outline-success" href="{{route('edit_book',['id'=>$book->id])}}"> Edit </a>
          <a class="btn btn-outline-danger" href="{{route('delete_book',['id'=>$book->id])}}"> Delete </a>
          <a class="btn btn-outline-primary" href="{{route('show_book',['id'=>$book->id])}}"> Show </a>
    @endforeach
    <a class="btn btn-outline-warning" href="{{route('create_book')}}"> Add a book </a>

</div>

@endsection

