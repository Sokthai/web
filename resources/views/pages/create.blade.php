@extends('layouts.master')
@section('title')
    Create
@stop

@section('content')
    {!! Form::open(['route' => 'books.store']) !!}

    <h2 align="center">Adding</h2>
    @include('pages.partialForm', ['submitButtonText' => 'Add Item'])

    {!! form::close() !!}

@stop