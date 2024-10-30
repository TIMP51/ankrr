@extends('layouts.header')
@section('title')Изменение {{$heroes->name}}@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Изменение персонажа</h2></div>
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
                        <form action="{{ route('heroes-update', $heroes->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Имя:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $heroes->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nickname">Прозвище:</label>
                                <input type="text" class="form-control" id="nickname" name="nickname" value="{{ $heroes->nickname }}">
                            </div>

                            <div class="form-group">
                                <label for="description" >Описание:</label>
                                <textarea class="form-control" rows=6 id="description" name="description" required>{{ $heroes->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="animation_id">Мультфильм:</label>
                                <select class="form-control" id="animation_id" name="animation_id" required>
                                    @foreach($animations as $animation)
                                        <option value="{{ $animation->id }}" {{ $heroes->animation_id == $animation->id ? 'selected' : '' }}>{{ $animation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="animation_id">Актер:</label>
                                <select class="form-control" id="actor_id" name="actor_id" required>
                                    @foreach($actors as $actor)
                                        <option value="{{ $actor->id }}" {{ $heroes->actor_id == $actor->id ? 'selected' : '' }}>{{$actor->last_name}} {{ $actor->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
