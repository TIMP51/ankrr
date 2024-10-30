@extends('layouts.header')
@section('title')
    Профиль
@endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card m-2">
                <div class="card-header">
                    <h5 class="card-title">Пользователь: {{ Auth::user()->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Имя: <strong>
                            @if(isset($user->first_name))
                            {{$user->first_name}}
                            @else
                                Отсутствует
                            @endif
                        </strong></p>
                    <p class="card-text">Фамилия: <strong>
                            @if(isset($user->first_name))
                                {{$user->last_name}}
                            @else
                                Отсутствует
                            @endif
                        </strong></p>
                    <a type="button" class="btn btn-secondary" href="{{ route('user-edit', Auth::user()->id) }}" >
                        {{ __('Редактировать') }}
                    </a>
                </div>
            </div>
                <div class="card m-2">
                    <div class="card-header">
                        <h5 class="card-title">Избранные</h5>
                    </div>
                    <div class="card-body">

                    <ul class="list-group">
                        @foreach($user->animations as $row)
                            <li class="list-group-item">
                                <strong>
                                <a class="text-black text-decoration-none link-primary"
                                   href="{{ route('anime-view', $row->id) }}">{{$row->name}}</a>
                                </strong>
                                <a href="{{route('anime-disliked', $row->id)}}" type="button" class="btn btn-danger float-end">
                                    {{__('Удалить из избранного')}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
