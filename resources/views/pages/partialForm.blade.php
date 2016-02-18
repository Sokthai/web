
{{--<div class = 'form-control'>--}}
@include('errors.error')

<div class = 'form-group'>
    {!! Form::label('title', 'Title: ') !!}
    {!! Form::text('title', null, [
        'placeholder' => 'Title',
        'class' => 'form-control'
    ]) !!}
</div>

<div class = 'form-group'>
    {!! Form::label('price', 'Price: ') !!}
    {!! Form::number('price', null, [
        'placeholder' => 'Price',
        'class' => 'form-control',
        'min' => '0',
        'step' => 'any'
    ]) !!}
</div>

<div class = 'form-group'>
    {!! Form::label('from', 'From: ') !!}
    {!! Form::text('from', null, [
        'placeholder' => 'Any',
        'class' => 'form-control'
    ]) !!}
</div>

<div class = 'form-group'>
    {!! Form::label('location', 'Storage Location: ') !!}
    {!! Form::text('location', null, [
        'placeholder' => 'Location',
        'class' => 'form-control'
    ]) !!}
</div>
<div class = 'form-group'>
    {!! Form::label('date', 'Date: ') !!}
    {!!Form::input('date', 'dates',  date('Y-m-d'), ['class' => 'form-control'])!!}
</div>
<div class = 'form-group'>
    {!! Form::label('description', 'Description: ') !!}
    {!! Form::textarea('description', null, [
        'placeholder' => 'Description',
        'class' => 'form-control'
    ]) !!}
</div>


    <div class = 'col-md-1 col-md-offset-8 size'>
        <a class="btn btn-default btn-lg" href="{{route('books.index')}}" role="button">Cancel</a>
    {{--{!! Form::button('cancel',  [--}}
            {{--'class' => 'btn btn-default  btn-lg',--}}
            {{--'name' => 'cancel'--}}
        {{--])--}}
    {{--!!}--}}

    </div>

    <div class="col-md-1 col-md-offset-1 size">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success active  btn-lg']) !!}
    </div>

{{--</div>--}}