@extends('layouts.master')
@section('title')
    Create
@stop

@section('index')
    <div class="fixed">
        <div class="container">
            <h2 align="center">{{$username}}</h2>
            @if (!is_null($searched))
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
                    @if (count($searched) <= 0)
                        <tr><td colspan='8' align="center" class = 'info'>No Records</td></tr

                    @else
                        @foreach($searched as $searching)

                            <tr>
                                <td>{{$no++}}</td>
                                <td><a href="{{route('books.show', $searching->id)}}">
                                        @if (strlen($searching->title) > 10)
                                            {{ str_limit($searching->title, $limit = 10, $end = '...') }}
                                        @else
                                            {{$searching->title}}
                                        @endif

                                    </a></td>
                                <td>{{$searching->price}}</td>
                                <td>
                                    @if (strlen($searching->from) > 10)
                                        {{ str_limit($searching->from, $limit = 10, $end = '...') }}
                                    @else
                                        {{$searching->from}}
                                    @endif
                                </td>
                                <td>
                                    @if (strlen($searching->location) > 15)
                                        {{ str_limit($searching->location, $limit = 15, $end = '...') }}
                                    @else
                                        {{$searching->location}}
                                    @endif
                                </td>
                                <td> @if (strlen($searching->description) > 25)
                                        {{ str_limit($searching->description, $limit = 25, $end = '...') }}
                                    @else
                                        {{$searching->description}}
                                    @endif
                                </td>
                                <td>{{$searching->date}}</td>
                                <td align = 'center'>{{Form::checkbox('checked', null)}}
                                    {{ Form::hidden('id', $searching->id) }}
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