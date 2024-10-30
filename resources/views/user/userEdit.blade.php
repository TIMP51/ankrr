@extends('layouts.header')
@section('title')
    Изменение профиля
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Редактирование профиля</h5>
                    </div>
                    <form action="{{ route('user-update', $user->id) }}" method="POST">
                        @csrf
                    <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="Ваше имя" />
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Фамилия</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="Ваша фамилия" />
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Login</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" />
                            </div>
                            <button type="submit" class="btn btn-primary">Сохарнить</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
