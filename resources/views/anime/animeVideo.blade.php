@extends('layouts.header')
@section('title')
    Видео
@endsection
@section('content')
    <video width = "640" height="480" controls>
        <source src="{{route('video',['filename'=>$filename])}}" type="video/mp4">
    </video>
@endsection