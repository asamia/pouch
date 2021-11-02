@extends('layouts.common')

@section('content')
    {!! Form::model($item, ['route' => 'upload.store', 'enctype' => "multipart/form-data"]) !!}
        {!! Form::file('image') !!}
        @if($item->image == null)
            <img src="{{ asset('images/cosme.png') }}">
        @else
            <img src="{{ asset('images/cosme.png') }}"> 
        @endif
        
    {!! Form::close() !!}
       
@endsection