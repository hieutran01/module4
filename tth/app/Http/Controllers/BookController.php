<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request->book){
            $search = $request->book;
          $books=  Book::where('name', 'LIKE', '%' . $search . '%')->paginate(2);
        }
        else{
            $books = Book::paginate(2);
        }
      
        // $books = Book::paginate(2);

        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        return view('books.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'isbn' => 'required',
            'tacgia' => 'required',
            'theloai'=>'required',
            'sotrang'=>'required',
            'namsanxuat'=>'required',
        ], [
            'name.required' => 'Không được để trống',
            'isbn.required' => 'Không được để trống',
            'tacgia.required' => 'Không được để trống',
            'theloai.required' => 'Không được để trống',
            'sotrang.required' => 'Không được để trống',
            'namsanxuat.required' => 'Không được để trống'
        ]);
        if ($validator->fails()) {
            return redirect()->route('books.create')
                ->withErrors($validator)
                ->withInput();
        }
        $books = new Book();
        $books->name = $request->name;
        $books->isbn = $request->isbn;
        $books->tacgia = $request->tacgia;
        $books->theloai = $request->theloai;
        $books->sotrang = $request->sotrang;
        $books->namsanxuat = $request->namsanxuat;
        $books->save();
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Book::find($id);
        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $books = Book::find($id);
        $books->name = $request->name;
        $books->isbn = $request->isbn;
        $books->tacgia = $request->tacgia;
        $books->theloai = $request->theloai;
        $books->sotrang = $request->sotrang;
        $books->namsanxuat = $request->namsanxuat;
        $books->save();
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::findOrFail($id);
        $books->delete();
        return redirect()->route('books.index');
    }
}