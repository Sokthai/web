@extends('layouts.master')
@section('title')
    Create
@stop

<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <label class="navbar-brand text"><a href="{{URL::to('/logout')}}">Logout</a></label>
            <button type ="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <ul class ="nav navbar-nav">
                <li class ="active"><a href="books">MAIN</a></li>
                <li><a href="books\create">ADD</a></li>
                <li><a href="search">SEARCH</a></li>
                <li><a href="#" onclick="deletes()">DELETE</a></li>
                <li><a href="{{URL::to('report')}}">REPORT</a></li>

            </ul>

        </div>

        {{--<div class="collapse navbar-collapse">--}}
            {{--<ul class ="nav navbar-nav">--}}
                {{--<li class ="active"><a href="books">Log out</a></li>--}}

            {{--</ul>--}}
        {{--</div>--}}

    </div>
</div>



@section('index')



<div class="fixed">
    <div class="container">
    <h2 align="center">{{$username}}</h2>



    @if (!is_null($books))
        <table  class = 'table-responsive table table-striped table-border table-hover' >
            <tr class="success">
                <th width = '40px'>No</th>
                <th width = '150px'>Title</th>
                <th width = '100px'>Price</th>
                <th width = '150px'>From</th>
                <th width = '150px'>Location</th>
                <th width = '300px' align = 'center'>Description</th>
                <th width = '150px'>Date</th>
                <th width = '20px'>Check</th>
            </tr>
        @if (count($books) <= 0)
                <tr><td colspan='8' align="center" class = 'info'>No Records</td></tr

        @else
            @foreach($books as $book)

                <tr>
                    <td>{{$no++}}</td>
                    <td><a href="{{route('books.show', $book->id)}}">
                            @if (strlen($book->title) > 10)
                                {{ str_limit($book->title, $limit = 10, $end = '...') }}
                            @else
                                {{$book->title}}
                            @endif

                        </a></td>
                    <td>{{$book->price}}</td>
                    <td>
                        @if (strlen($book->from) > 10)
                            {{ str_limit($book->from, $limit = 10, $end = '...') }}
                        @else
                            {{$book->from}}
                        @endif
                    </td>
                    <td>
                        @if (strlen($book->location) > 15)
                            {{ str_limit($book->location, $limit = 15, $end = '...') }}
                        @else
                            {{$book->location}}
                        @endif
                    </td>
                    <td> @if (strlen($book->description) > 25)
                            {{ str_limit($book->description, $limit = 25, $end = '...') }}
                        @else
                            {{$book->description}}
                        @endif
                    </td>
                    <td>{{$book->dates}}</td>
                    <td align = 'center'>{{Form::checkbox('checked', null)}}
                        {{ Form::hidden('id', $book->id) }}
                    </td>
                </tr>
            @endforeach


        @endif
        </table>
    @else
        <h2>no books</h2>
    @endif
    </div>
</div>
@stop