@extends('layouts.master')
@section('title')
    Search...
@stop

@section('content')

    {!! Form::open(['route' => 'searched.store']) !!}
    {{--{!! Form::open(['method' => 'get', 'URL::to(searched)']) !!}--}}
    <h2 align="center">Searching</h2>
    <fieldset>
        <legend>Search by</legend>
        {!! form::label('lblTitle', "Title :") !!}
        {!! form::text('title', null, ['class' => 'form-control']) !!}
        {{ Form::hidden('searched', true) }}

        {!! form::label('dateFrom', "Date from:") !!}
        {!!Form::input('date', 'fromDate', date('Y-m-d'), ['class' => 'form-control'])!!}
        {!! form::label('dateTo', "Date to:") !!}
        {!!Form::input('date','toDate', date('Y-m-d'), ['class' => 'form-control'])!!}

        {!! form::label('price', "Price from:") !!}
        {!! Form::number('fromPrice', null, [
                        'placeholder' => '0',
                        'min' => '0',
                        'step' => 'any',
                        'class' => 'form-control']) !!}
        {!! form::label('price', "Price to:") !!}
        {!! Form::number('toPrice', null, [
                        'placeholder' => '100',
                        'min' => '0',
                        'step' => 'any',
                        'class' => 'form-control']) !!}
        <br/>
        <div class = 'col-md-1 col-md-offset-8 size'>
            <a class="btn btn-default btn-lg" href="{{route('books.index')}}" role="button">Cancel</a>
        </div>

        <div class="col-md-1 col-md-offset-1 size">
{{--            {!! Form::submit('Search', ['onclick' => "search()", 'class' => 'btn btn-success active  btn-lg']) !!}--}}
            {!! Form::submit('Searched', ['class' => 'btn btn-success active  btn-lg']) !!}


        </div>

    </fieldset>
    {!! form::close() !!}

@stop


