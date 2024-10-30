@extends('layouts.header')
@section('title')
    {{$name->name}}
@endsection
@section('content')
    <div class="container mx-auto" style="width: 600px">
        <h1>Страница изменения жанра: {{$name->name}}</h1>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mx-auto" style="width: 600px">
        <form action="{{route('genres-update',$name->id)}}" method="post">
            @csrf
            <div class="form-group mt-2">
                <lable for="name">Название жанра</lable>
                <input class="form-control" type="text" id="name" name="name" value="{{$name->name}}"
                       placeholder="Введите названеи студии">
            </div>
            <button type="submit" class="btn btn-success mt-2">Сохранить</button>
        </form>
    </div>
@endsection
