@extends('layouts.header')
@section('title')
    Мультфильмы
@endsection
@section('content')
    <div class="row">
        {{--            фильтр--}}
        <div class="col-md-2"><h1>Фильтр</h1>
            <div class="form-inline ms-2" style="border:1px solid #cecece;">
                <form action="{{ route('filter') }}" method="GET">
                    <ul class="list-group m-2">
                        <div class="list-group">
                            <label class="fs-3" for="genre_ids">Выберите жанры:</label>
                            <label class="form-control" id="genre_check" multiple required>
                                @foreach($genres as $genre)
                                    <input class="form-check-input" type="checkbox" value="{{ $genre->id }}"
                                           name="genres[]" id="genre-{{ $genre->id }}">
                                    <label class="form-check-label" for="genre-{{ $genre->id }}"
                                           value="{{ $genre->id }}">{{ $genre->name }} </label><br>
                                @endforeach
                            </label>
                        </div>

                        <div class="card-group">
                            <label class="fs-2" for="type_id">Тип</label>
                            <select class="form-control input-sm mt-2" id="type_id" name="type_id">
                                @foreach($type as $row)
                                    <option value="{{$row->id}}">{{$row->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label class="fs-2" for="studio_id">Студия:</label><br>
                            <select class="form-control input-sm mt-2" id="studio_id" name="studio_id">
                                @foreach($studio as $row)
                                    <option value="{{$row->id}}">
                                        {{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="m-2">
                            <button type="submit" name="action" value="filter" class="btn btn-primary">Фильтр</button>
                            <a href="{{route('anime')}}" class="btn btn-danger mt-1">
                                {{__('Очистить')}}
                            </a>
                        </div>
                    </ul>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <h1>Список мультфильмов
                    <div class="btn-group col-2 ms-5">
                        <button type="button" class="btn btn-light dropdown-toggle btn-outline-dark"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                            Сортировка
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item sort-btn " data-sort-method="name"
                                   href="{{route('sortName')}}">по
                                    названию</a>
                            </li>
                            <li>
                                <a class="dropdown-item sort-btn" data-sort-method="data"
                                   href="{{route('sortData')}}">по
                                    дате</a>
                            </li>
                        </ul>
                    </div>
                </h1>
                @foreach($anime as $row)
                    <div class="col-md-3 mt-3">
                        <a href="{{route('anime-view',$row->id)}}" class="text-decoration-none">
                            <div class="card" style="text-align: center">
                                <img id="image" src="{{ asset('images/'.$row->image) }}" class="card-img-top"
                                     alt="{{ $row->name }}"
                                     style="max-width: 300px; max-height: 410px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title" >{{ $row->name }}</h5>
                                    <div class="card-footer">
                                        <p class="card-text" >Тип: {{ $row->type->name }}</p>
                                        <p class="card-text ">Студия: {{$row->studio->name}}</p>
                                        <p>Средний рейтинг:
                                        @php
                                            $averageRating = $row->averageRating;
                                        @endphp
                                        @if($averageRating==0)
                                            нет отзывов.
                                        @else
                                            {{ $averageRating }} из 5
                                        @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="d-flex mt-2">{{ $anime->links() }}</div>
            </div>
        </div>
    </div>
@endsection
