@extends('layouts.header')
@section('title'){{$studios->name}}@endsection
@section('content')
    <div class="container mx-auto" style="width: 600px">
    <h1>Страница изменения студии: {{$studios->name}}</h1>
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
    <form action="{{route('studios-view-update',$studios->id)}}" method="post">
        @csrf
        <div class="form-group mt-2">
            <lable for="name">Название студии</lable>
            <input class="form-control" type="text" id="name" name="name" value="{{$studios->name}}" placeholder="Введите названеи студии">
        </div>
        <div class="form-group mt-2">
            <lable for="country_id">Выберите страну</lable>
            <select class="form-control input-sm mt-2" id="country_id" name="country_id">
                @foreach($country as $dropdown)
                    <option {{$dropdown->id == $studios->country_id ? 'selected':''}}
                        value="{{$dropdown->id}}">{{$dropdown->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-2">Сохранить</button>
    </form>
    </div>
@endsection
