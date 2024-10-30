@extends('layouts.header')
@section('title')
    Студия
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Добавление студии</h2></div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('studios-create')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <lable for="name">Название студии</lable>
                                <input class="form-control" type="text" id="name" name="name"
                                       placeholder="Введите названеи студии" unique>
                            </div>
                            <div class="form-group mt-2">
                                <lable for="country_id">Выберите страну</lable>
                                <select class="form-control mt-2" id="country_id" name="country_id">
                                    @foreach($country as $dropdown)
                                        <option value="{{$dropdown->id}}">{{$dropdown->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
