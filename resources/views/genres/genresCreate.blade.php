@extends('layouts.header')
@section('title')
    Жанр
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Добавление жанра</h2></div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class=" alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('genres-create')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <lable for="name">Название жанра</lable>
                                <input class="form-control" type="text" id="name" name="name"
                                       placeholder="Введите названеи жанра" required unique>
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
