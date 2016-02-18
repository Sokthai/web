@extends('layouts.master')
@section('title')
    Report {{$totalBook}}
@stop

@section('content')


    {{--{!! Form::open(['method' => 'get', 'route' => ['books.edit', $book->id]]) !!}--}}
    <h1 align="center">{{$username}}</h1>
    {!!Form::open([
        'method' => 'get',
        'route' => ['books.index']
        ])!!}
            {!! Form::label('lblDescription', 'Total books in the stock') !!}
            <div class="form-group">
                {!! Form::label('lblTitle', 'Total books: ') !!}
                {!! Form::label($totalBook) !!}
            </div>
            <div class="form-group">
                {!! Form::label('lblPrice', 'Total Price: ') !!}

                {!! Form::label($totalPrice . "$") !!}
                <br/>
            </div>


            <div class="col-md-1 col-md-offset-1">

                {!! Form::submit('Ok', ['class' => 'btn btn-success btn-lg'])!!}
            </div>

    {!! Form::close() !!}
@stop
