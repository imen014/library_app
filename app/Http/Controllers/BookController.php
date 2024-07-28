<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\File;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'book_title' => 'string|max:255',
            'isbn' => 'string|max:255',
            'basic_idea' => 'string|max:255',
            'author' => 'string|max:255',
            'price' => 'string|max:255',
            'publication_year' => 'string|max:255',
            'categorie' => 'string|max:255',
            'book' => 'required|file|mimes:pdf,doc,docx,txt|max:2048',

        ]);
        $book = new Book();
        $book->isbn = $request->input('isbn');
        $book->basic_idea = $request->input('basic_idea');
        $book->author = $request->input('author');
        $book->price = $request->input('price');
        $book->publication_year = $request->input('publication_year');
        $book->categorie = $request->input('categorie');
        if ($request->hasFile('book')) {
            $file = $request->file('book');
            $filename = $request->input('book_title') . '_' .  $request->input('isbn') . '_' . $file->getClientOriginalName();
            $destinationPath = storage_path('books');


            // Vérifier si le dossier existe, sinon le créer
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Déplacer le fichier
            $file->move($destinationPath, $filename);
            $book->book_title = $file->getClientOriginalName();
            $book->file_path = 'books/' . $filename; // Assigner le chemin du fichier à la colonne appropriée
        }
    
        $book->save();
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show')->with('book',$book);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit')->with('book',$book);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated_data = $request->validate([
            'book_title' => 'string|max:255',
            'isbn' => 'string|max:255',
            'basic_idea' => 'string|max:255',
            'author' => 'string|max:255',
            'price' => 'string|max:255',
            'publication_year' => 'string|max:255',
            'categorie' => 'string|max:255',
            'book' => 'file|mimes:pdf,doc,docx,txt|max:2048',

        ]);
        $book = Book::findOrFail($id);
        $book->isbn = $request->input('isbn');
        $book->basic_idea = $request->input('basic_idea');
        $book->author = $request->input('author');
        $book->price = $request->input('price');
        $book->publication_year = $request->input('publication_year');
        $book->categorie = $request->input('categorie');
        if ($request->hasFile('book')) {
            $file = $request->file('book');
            $filename = $request->input('book_title') . '_' .  $request->input('isbn') . '_' . $file->getClientOriginalName();
            $destinationPath = storage_path('books');


            // Vérifier si le dossier existe, sinon le créer
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Déplacer le fichier
            $file->move($destinationPath, $filename);
            $book->book_title = $file->getClientOriginalName();
            $book->file_path = 'books/' . $filename; // Assigner le chemin du fichier à la colonne appropriée
        }
    
        $book->update();
       
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return view('books.deleted');
    }

    public function download($filename)
    {
        // Définir le chemin complet du fichier
        $path = storage_path('books/' . $filename);

        // Vérifier si le fichier existe
        if (!file_exists($path)) {
            abort(404);
        }

        // Retourner le fichier pour le téléchargement
        return response()->download($path);
    }
    public function view($filename)
    {
        // Définir le chemin complet du fichier
        $path = storage_path('books/' . $filename);

        // Vérifier si le fichier existe
        if (!file_exists($path)) {
            abort(404);
        }

        // Retourner le fichier PDF
        return response()->file($path);
    }
}
