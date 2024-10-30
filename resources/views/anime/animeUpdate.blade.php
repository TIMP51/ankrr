@extends('layouts.header')
@section('title')
    {{$animation->name}}
@endsection
@section('content')
    <div class="container mx-auto">
        <h1>Изменение мультфильма: {{$animation->name}}</h1>
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
    <form action="{{route('anime-update',$animation->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!-- картинка -->
                    <img src="{{ asset('images/'.$animation->image) }}" alt="muppet-movie" class="img-fluid">
                    <label for="image">Изображение:</label>
                    <input type="file" class="form-control-file" id="image" name="image" >
                    <div>
                        *Примечание: формат файла - <strong>jpg,bmp,webp,png</strong>.
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- информация -->
                    <div class="form-group mt-2">
                        <label class="fs-2" for="name">Название</label><br>
                        <input type="text" id="name" name="name" value="{{$animation->name}}">
                    </div>
                    <div class="form-group">
                        <label class="fs-2" for="description">Описание</label>
                        <textarea class="form-control" rows="10" id="description"
                                  name="description">{{$animation->description}}</textarea>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 form-group ">
                            <h4>Жанры:</h4>
                            <div class="container">
                                <div class="row">
                                    <ul>
                                        @foreach($animation->genres as $row)
                                            <div class="col-md-10 m-3">
                                            <li class="fst-italic">{{$row->name}}<a class="btn btn-danger ms-5 float-end"
                                                    href="{{route('genre-delete',['ani_id'=>$animation->id, 'gen_id'=>$row->id])}} ">Удалить</a></li>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <h4>Страны:</h4>
                            <div class="container">
                                <div class="row">
                                    <ul>
                                        @foreach($animation->countries as $row)
                                            <div class="col-md-10 m-3">
                                                <li class="fst-italic">{{$row->name}}<a class="btn btn-danger ms-5 float-end"
                                                        href="{{route('country-delete',['ani_id'=>$animation->id, 'cou_id'=>$row->id])}} ">Удалить</a></li>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form group">
                        <label class="fs-3" for="genre_ids">Выберите жанры:</label>
                        <select class="form-control" id="genre_ids" name="genre_ids[]" multiple>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form group">
                        <label class="fs-3" for="genre_ids">Выберите страну(страны):</label>
                        <select class="form-control" id="country_ids" name="country_ids[]" multiple>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="fs-2" for="type_id">Тип:</label><br>
                        <select class="form-control input-sm mt-2" id="type_id" name="type_id">
                            @foreach($type as $row)
                                <option
                                    {{$row->id == $animation->type_id ? 'selected':''}} value="{{$row->id}}">{{$row->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="fs-2" for="category_id">Возрастная категория:</label><br>
                        <select class="form-control input-sm mt-2" id="category_id" name="category_id">
                            @foreach($category as $row)
                                <option
                                    {{$row->id == $animation->category_id ? 'selected':''}} value="{{$row->id}}">{{$row->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="fs-2" for="studio_id">Студия:</label><br>
                        <select class="form-control input-sm mt-2" id="studio_id" name="studio_id">
                            @foreach($studio as $row)
                                <option
                                    {{$row->id == $animation->studio_id ? 'selected':''}} value="{{$row->id}}">
                                    {{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="release_year">Год выхода:</label><br>
                        <input type="date" id="release_year" name="release_year"
                               value="{{$animation->release_year}}">
                    </div>
                    <button type="submit" class="btn btn-success mt-2" id="liveToastBtn">Сохранить</button>
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <img src="..." class="rounded me-2" alt="...">
                                <strong class="me-auto">Bootstrap</strong>
                                <small>11 mins ago</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Hello, world! This is a toast message.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
