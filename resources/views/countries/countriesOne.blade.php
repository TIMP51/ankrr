@extends('layouts.header')
@section('title')
    {{$name->name}}
@endsection
@section('content')
    <div class="container mx-auto" style="width: 600px">
    <h1>Страница изменения страны: {{$name->name}}</h1>
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
        <form action="{{route('countries-view-update',$name->id)}}" method="post">
            @csrf
            <div class="form-group mt-2" style="width: 800px">
                <lable for="name">Название страны</lable>
                <input class="form-control" type="text" id="name" name="name" value="{{$name->name}}"
                       placeholder="Введите названеи страны">
            </div>
            <button type="submit" class="btn btn-success mt-2">Сохранить</button>
        </form>
    </div>
@endsection
