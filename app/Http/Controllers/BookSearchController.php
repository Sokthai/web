<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests;
use Session;
use Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class BookSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return view('pages.search');
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
            return view('pages.search');
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
    public function store(Request $request)
    {
        if (Auth::check()) {

            if ($request->fromDate == "") {
                $request->fromDate = date('Y-m-d');
            } elseif ($request->toDate == "") {
                $request->toDate = date('Y-m-d');
            }

            if (($request->title != "") && ($request->fromPrice != "") && ($request->toPrice != "") //all
                && ($request->fromDate < $request->toDate)
            ) {
                $books = Book::Where('title', '=', $request->title)
                    ->whereBetween('price', [$request->fromPrice, $request->toPrice])
                    ->whereBetween('dates', [$request->fromDate, $request->toDate])
                    ->where('user_id', '=', Auth::user()->id)
                    ->get();

            } elseif (($request->title != "") && ($request->fromDate < $request->toDate)) { //title & date
                $books = Book::Where('title', '=', $request->title)
                    ->whereBetween('dates', [$request->fromDate, $request->toDate])
                    ->where('user_id', '=', Auth::user()->id)
                    ->get();

            } elseif (($request->title != "") && ($request->fromPrice != "") && ($request->toPrice != "") //title & price
                && ($request->fromDate = $request->toDate)
            ) {
                $books = Book::Where('title', '=', $request->title)
                    ->whereBetween('price', [$request->fromPrice, $request->toPrice])
                    ->where('user_id', '=', Auth::user()->id)
                    ->get();

            } elseif (($request->fromDate < $request->toDate) && ($request->fromPrice != "") && ($request->toPrice != "")) { //price & date
                $books = Book::whereBetween('price', [$request->fromPrice, $request->toPrice])
                    ->whereBetween('dates', [$request->fromDate, $request->toDate])
                    ->where('user_id', '=', Auth::user()->id)
                    ->get();

            } elseif ($request->title != "") { //title
                $books = Book::Where('title', 'LIKE', '%' . $request->title . '%')
                    ->where('user_id', '=', Auth::user()->id)
                    ->get();
                   // return Auth::user()->id;

            } elseif (($request->fromPrice != "") && ($request->toPrice != "")) { //price
                $books = Book::whereBetween('price', [$request->fromPrice, $request->toPrice])
                    ->where('user_id', '=', Auth::user()->id)
                    ->get();

            } else {//date
                $books = Book::whereBetween('dates', [$request->fromDate, $request->toDate])
                    ->where('user_id', '=', Auth::user()->id)
                    ->get();

            }
            $username = 'Allen';
            $no = 1;
            return view('pages.index', compact('books', 'username', 'no'));
        }else{
            return redirect('/login');
        }
    }

    public function sendEmail(Request $request){

        $data = ['name' => "Array data in the route"];
        Mail::send('auth.passwords.recovery', $data, function ($message) use ($request) {
            $message->from('sokthaitang@gmail.com', 'Book System');
            $message->to($request->email)->subject('Book System password recovery');});

        return redirect('/login');
    }
}
