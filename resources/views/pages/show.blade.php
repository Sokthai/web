@extends('layouts.master')
@section('title')
    Show:: {{$book->title}}
@stop

@section('content')


    {{--{!! Form::open(['method' => 'get', 'route' => ['books.edit', $book->id]]) !!}--}}
    <h1 align="center">Allen</h1>
    {!!Form::open([
        'method' => 'delete',
        'route' => ['books.destroy', $book->id]
        ])!!}
        <div class="form-group">
            {!! Form::label('lblTitle', 'Title: ') !!}
            {!! Form::label($book->title) !!}
        </div>
        <div class="form-group">
            {!! Form::label('lblPrice', 'Price: ') !!}

            {!! Form::label($book->price . "$") !!}
            <br/>
        </div>
        <div class="form-group">
            {!! Form::label('lblFrom', 'From: ') !!}

            {!! Form::label($book->from) !!}
            <br/>
        </div>
        <div class="form-group">
            {!! Form::label('lblLocation', 'Storage Location: ') !!}

            {!! Form::label('location', $book->location) !!}
            <br/>
        </div>
        <div class="form-group">
            {!! Form::label('lblDate', 'Date: ', ['class' => '.visible-lg-*']) !!}

            {!! Form::label($book->date) !!}
            <br/>
        </div>

        <div class="form-group">
            {!! Form::label('lblDescription', 'Description: ') !!}
            {!! Form::textarea('description', $book->description, ['class' => 'form-control', 'readonly']) !!}
            <br/>
        </div>
        <div class = 'col-md-1 col-md-offset-6'>
            {{--<a class="btn btn-default btn-lg" href="{{route('books.index')}}" role="button">Cancel</a>--}}
            <a class="btn btn-default btn-lg " href="{{route('books.index', $book->id)}}">Cancel</a>

        </div>

        <div class = 'col-md-1 col-md-offset-1'>
            <a class="btn btn-success btn-lg" href="{{route('books.edit', $book->id)}}">Edit</a>
        </div>
        <div class="col-md-1 col-md-offset-1">

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])!!}
        </div>

    {!! Form::close() !!}
@stop
