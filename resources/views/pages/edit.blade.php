@extends('layouts.master')
@section('title')
    Edit:: {{$book->title}}
@stop

@section('content')
    {!! Form::model($book,[
            'method' => 'PATCH',
            'route' => ['books.update', $book->id]
            ]) !!}

    <h1 align="center">Allen</h1>

    @include('pages.partialForm', ['submitButtonText' => 'Update Item'])


    {!! Form::close() !!}

@stop
