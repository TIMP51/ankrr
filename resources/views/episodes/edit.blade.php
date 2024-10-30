@extends('layouts.header')
@section('title')Изменение {{$episodes->name}}@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Изменение эпизода</h2></div>
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
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <form action="{{ route('episodes-update', $episodes->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Имя:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $episodes->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description" >Описание:</label>
                                <textarea class="form-control" rows=6 id="description" name="description" required>{{ $episodes->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="animation_id">Мультфильм:</label>
                                <select class="form-control" id="animation_id" name="animation_id" required>
                                    @foreach($animations as $animation)
                                        <option value="{{ $animation->id }}" {{ $episodes->animation_id == $animation->id ? 'selected' : '' }}>{{ $animation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                            <label>Выберите видео:</label>
                                <input type="file" name="video" id="video" class="form-control-file" required>
                            </div>
                            <br>
                            <div>
                                *Примечание: формат файла - <strong>mp4</strong>, <br>максималный размер <strong>не более 100мб</strong>.
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
