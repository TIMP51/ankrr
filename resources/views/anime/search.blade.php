@extends('layouts.header')
@section('title')
    Мультфильмы
@endsection
@section('content')
    <div class="container">
        <h1>Список мультфильмов
        <div class="btn-group col-2 ms-5">
                <button type="button" class="btn btn-light dropdown-toggle btn-outline-dark" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    Сортировка
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item sort-btn " data-sort-method="name" href="{{route('sortName')}}">по имени</a>
                    </li>
                    <li>
                        <a class="dropdown-item sort-btn" data-sort-method="data" href="{{route('sortData')}}">по дате</a>
                    </li>
                </ul>
            </div>
        </h1>
        <div class="row">
            @if(count($anime))
                @foreach($anime as $row)
                    <div class="col-md-3 mt-3">
                        <a href="{{route('anime-view',$row->id)}}" class="text-decoration-none">
                            <div class="card">
                                <img id="image" src="{{ asset('images/'.$row->image) }}" class="card-img-top"
                                     alt="{{ $row->name }}"
                                     style="max-width: 100%; height: auto">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $row->name }}</h5>
                                    <div class="card-footer">
                                        <p class="card-text">Тип: {{ $row->type->name }}</p>
                                        <p class="card-text ">Студия: {{$row->studio->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p class="">Записей не найдено</p>
            @endif
        </div>
    </div>
@endsection
