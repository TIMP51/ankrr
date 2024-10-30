@extends('layouts.header')
@section('title')
    Добавление актера
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Добавление актера</h2></div>
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
                        <form action="{{ route('actors-store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- картинка -->
                                <label for="image">Изображение</label>
                                <input type="file" class="form-control-file" id="image" name="image" >
                            </div>
                            <div class="form-group">
                                <label for="first_name">Имя:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Фамилия:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>

                            <div class="form-group">
                                <label for="father_name">Отчество:</label>
                                <input type="text" class="form-control" id="father_name" name="father_name">
                            </div>
                            <div class="form-group mt-2">
                                <lable for="country_id">Место рождения:</lable>
                                <select class="form-control mt-2" id="country_id" name="country_id">
                                    @foreach($country as $dropdown)
                                        <option value="{{$dropdown->id}}">{{$dropdown->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="birth">Дата рождения:</label><br>
                                <input type="date" id="birth" name="birth" >
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
