<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DB;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Http\Requests;
use App\Http\Requests\BooksRequest;
use App\Http\Controllers\Controller;
use Session;
use Auth;
use Request;

use Illuminate\View\Middleware\ErrorBinder;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {

        if (Auth::check()) {

//        Session::put('key', 'laravelValue'); //set session
//        $value = Session::get('key'); //retrieve session

            //$books = Book::latest('date')->currentDate()->get();
            $books = Book::where('user_id', '=', Auth::user()->id)->get();
            $username = Auth::user()->name;
            $no = 1;
            return view('pages.index', compact('books', 'username', 'no'));
        }else{
            return redirect('/login');
        }
    }

    public function report(){
        if (Auth::check()) {
            $totalBook = Book::where('user_id', '=', Auth::user()->id)->count();
            $totalPrice = Book::where('user_id', '=', Auth::user()->id)->sum('price');
            $username = Auth::user()->name;
            return view('pages.report', compact('totalBook', 'totalPrice', 'username'));
        }else{
            return redirect('/login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('pages.create');
        }else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request)
    {
//        return "ok";
        if (Auth::check()) {

            if ($request->searched == false) { //store

                $book = $request->all();
                $book['user_id'] = Auth::user()->id;

                Book::create($book);
                Session::flash('flashKey', 'Your item has been created successfully');
                return redirect()->route('books.index');
            } else { //search
//                if ($request->fromDate == "") {
//                    $request->fromDate = date('Y-m-d');
//                } elseif ($request->toDate == "") {
//                    $request->toDate = date('Y-m-d');
//                }
//
//                if (($request->title != "") && ($request->fromPrice != "") && ($request->toPrice != "") //all
//                    && ($request->fromDate < $request->toDate)
//                ) {
//                    $books = Book::Where('title', '=', $request->title)
//                        ->whereBetween('price', [$request->fromPrice, $request->toPrice])
//                        ->whereBetween('date', [$request->fromDate, $request->toDate])
//                        ->get();
//
//                } elseif (($request->title != "") && ($request->fromDate < $request->toDate)) { //title & date
//                    $books = Book::Where('title', '=', $request->title)
//                        ->whereBetween('date', [$request->fromDate, $request->toDate])
//                        ->get();
//
//                } elseif (($request->title != "") && ($request->fromPrice != "") && ($request->toPrice != "") //title & price
//                    && ($request->fromDate = $request->toDate)
//                ) {
//                    $books = Book::Where('title', '=', $request->title)
//                        ->whereBetween('price', [$request->fromPrice, $request->toPrice])
//                        ->get();
//
//                } elseif (($request->fromDate < $request->toDate) && ($request->fromPrice != "") && ($request->toPrice != "")) { //price & date
//                    $books = Book::whereBetween('price', [$request->fromPrice, $request->toPrice])
//                        ->whereBetween('date', [$request->fromDate, $request->toDate])
//                        ->get();
//
//                } elseif ($request->title != "") { //title
//                    $books = Book::Where('title', 'LIKE', '%' . $request->title . '%')->get();
//
//
//                } elseif (($request->fromPrice != "") && ($request->toPrice != "")) { //price
//                    $books = Book::whereBetween('price', [$request->fromPrice, $request->toPrice])->get();
//
//                } else {//date
//                    $books = Book::whereBetween('date', [$request->fromDate, $request->toDate])->get();
//
//                }
//                $username = 'Allen';
//                $no = 1;
//                return view('pages.index', compact('books', 'username', 'no'));
            }
        }else{
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $book = Book::findOrFail($id);

            return view('pages.show', compact('book'));
        }else{
            return redirect('/login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $book = Book::findOrFail($id);

            return view('pages.edit', compact('book'));
        }else{
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BooksRequest $request, $id)
    {
        if (Auth::check()) {
            $book = Book::findOrFail($id);
            $book->update($request->all());
//        $book->title = $request->title;
//        $book->price = $request->price;
//        $book->save(); //we can update one by one or just use all()
            return redirect()->route('books.index');
        }else{
            return redirect('/login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {

            Book::find($id)->delete();
            return redirect()->route('books.index');
        }else{
            return redirect('/login');
        }
    }

    public function delete($id){
        if (Auth::check()) {
            Book::find($id)->delete();
        }else{
            return redirect('/login');
        }
    }

    public function getLogout(){
        $this->Auth->logout();
        return redirect('/login');
    }

}
