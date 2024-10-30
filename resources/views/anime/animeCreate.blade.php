@extends('layouts.header')
@section('title')
    Добавление мультфильма
@endsection
@section('content')
    <div class="container mx-auto">
        <h1>Добавление мультфильма:</h1>
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
    <form action="{{route('anime-create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <!-- картинка -->
                <label for="image">Изображение</label>
                <input type="file" class="form-control-file" id="image" name="image" >
                <div>
                    *Примечание: формат файла - <strong>jpg,bmp,webp,png</strong>.
                </div>
            </div>
            <!-- информация -->
            <div class="form-group mt-2">
                <label class="fs-2" for="name">Название</label><br>
                <input class="form-control" type="text" id="name" name="name" placeholder="Введите название" >
            </div>
            <div class="form-group">
                <label class="fs-2" for="description">Описание</label>
                <textarea class="form-control" rows="10" id="description" name="description"
                          placeholder="Введите описание" ></textarea>
            </div>
            <br>
            <div class="form group">
                <label class="fs-3" for="genre_ids">Выберите жанры:</label>
                <br>
                <select class="form-control" name="genres[]" id="genres" multiple >
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form group">
                <label class="fs-3" for="country_ids">Выберите страну(страны):</label>
                <br>
                <select class="form-control" name="countries[]" id="countries" multiple >
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label class="fs-2" for="type_id">Тип:</label><br>
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
            <div class="form-group mt-2">
                <label for="release_year">Год выхода:</label><br>
                <input type="date" id="release_year" name="release_year" >
            </div>
            <button type="submit" class="btn btn-success mt-2">Сохранить</button>
        </div>

    </form>
@endsection
