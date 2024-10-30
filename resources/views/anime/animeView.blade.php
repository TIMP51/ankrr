@extends('layouts.header')
@section('title')
    {{$anime->name}}
@endsection
@section('content')
{{--    @if ($message = Session::get('licked'))--}}
{{--        <div class="alert alert-success alert-block">--}}
{{--            <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--            <strong>{{ $message }}</strong>--}}
{{--        </div>--}}
{{--    @elseif($message = Session::get('disliked'))--}}
{{--        <div class="alert alert-success alert-block">--}}
{{--            <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--            <strong>{{ $message }}</strong>--}}
{{--        </div>--}}
{{--    @endif--}}
    <div class="container mx-auto">
        <h1>{{$anime->name}}</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- картинка -->
                <img id="image" src="{{ asset('images/'.$anime->image) }}" class="card-img-top"
                     alt="{{ $anime->name }}"
                     style="max-width: 95%; height: auto">
                @guest()
                @else
                    @if(auth()->user()->role=='admin')
                        <a href="{{route('anime-view-update',$anime->id)}}" class="btn btn-success mt-1">
                            {{__('Изменить')}}
                        </a>
                        <a href="{{route('anime-delete', $anime->id)}}" class="btn btn-danger mt-1">
                            {{__('Удалить')}}
                        </a>
                        <a href="{{route('episodes-create', $anime->id)}}" class="btn btn-outline-dark mt-1">
                            {{__('Добавить эпизода')}}
                        </a>
                    @endif
                        @if($userNames)
                            <a href="{{route('anime-disliked', $anime->id)}}" class="btn btn-outline-dark mt-1">
                                {{__('Удалить из избранного')}}
                            </a>
                        @else
                            <a href="{{route('anime-liked', $anime->id)}}" class="btn btn-outline-dark mt-1">
                                {{__('Добавить в избранное')}}
                            </a>
                        @endif
                @endguest
            </div>
            <div class="col-md-8">
                <!-- информация -->
                <div class="row">
                    <div class="col-md-6">
                        <h2>Средний рейтинг</h2>
                        @if($averageRating==0)
                            нет отзывов.
                        @else
                            {{ $averageRating }} из 5
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h2>Возрастная категория</h2>
                            {{ $anime->category->name }}
                    </div>
                </div>
                <div class="list-group">
                <h2>Описание</h2>
                <p>{{$anime->description}}</p>
                </div>
                <div class="row">
                    <div class="list-group ms-2 col">
                        <h4>Жанры</h4>
                        <ul>
                            @foreach($anime->genres as $row)
                                <li class="fst-italic">{{$row->name}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="list-group col">
                        <h4>Персонажи</h4>
                        <ul>
                            @foreach($anime->heroes as $hero)
                                <li>
                                    <a class="text-black text-decoration-none link-primary"
                                       href="{{ route('heroes-show', $hero->id) }}">{{$hero->name}}
                                        {{$hero->nickname}}</a>
                                    @if(!empty($hero->actor->id))
                                        <a class="text-black text-decoration-none link-primary"
                                           href="{{ route('actors-show', $hero->actor->id) }}">({{$hero->actor->first_name}}
                                            {{$hero->actor->last_name}})</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="list-group ms-2 col">
                        <h4>Страна</h4>
                        <ul>
                            @foreach($anime->countries as $row)
                                <li class="fst-italic">{{$row->name}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="list-group">
                    <h4>Тип:</h4>
                    <p>{{$anime->type->name}}</p>
                </div>
                <div class="list-group">
                    <h4>Студия:</h4>
                    <p>{{$anime->studio->name}}</p>
                </div>
                <div class="list-group">
                    <h4>Год выхода:</h4>
                    <p>{{ \Jenssegers\Date\Date::parse($anime->release_year)->format('j F Y') }}</p>
                </div>

            </div>
        </div>
        <div class="accordion my-2 " id="accordionExample">
            <h2>Эпизоды</h2>
        @foreach($anime->episodes as $row)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button link-dark collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#{{strtr($row->name, [' ' => ''])}}" aria-expanded="false" aria-controls="collapseOne">
                            <text> Описание серии {{$col++}}: <strong>{{$row->name}}</strong></text>
                    </button>
                </h2>
                <div id="{{strtr($row->name, [' ' => ''])}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                        @if(isset($row->video))
                        <video width="640" height="480" controls>
                            <source src="{{ asset('storage/'.$row->video)}}" type="video/mp4">
                        </video>
                        <br>
                        @endif
                        {{$row->description}}
                    </div>
                </div>

            </div>
        @endforeach
            <div class="container mt-5">
                <h1>Комментарии</h1>
                <hr>
                @auth
                    <div class="card">
                        <div class="card-header">
                            @if ($anime->hasReviewFromUser(auth()->id()))
                            Изменить комментарий
                            @else
                                Добавить комментарий
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($anime->hasReviewFromUser(auth()->id()))
                                @foreach ($anime->comments as $comm)
                                    @if($comm->user_id == $userId)
                                        <form method="POST" action="{{ route('comment-edit', $anime->id) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group">
                                                <label for="text">Текст отзыва:</label>
                                            <textarea class="form-control" name="text" id="text">{{ $comm->text }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="rating">
                                                    <span class="rating-label">Оценка:</span>
                                                    {{$comm->rating}}
                                                    <br>
                                                    Изменить на:
                                                    <div class="rating-stars">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <label class="rating-star">
                                                                <input type="radio" name="rating" value="{{ $i }}" {{ $i == old('rating', 1)? 'checked' : '' }}>
                                                                <i class="fas fa-star {{ $i <= old('rating', 1)? 'checked' : '' }}"></i>
                                                            </label>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-success" type="submit" >Сохранить изменения</button>
                                        </form>
                                    @endif
                                @endforeach
                            @else
                                <form action="{{ route('comment-add', $anime->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="text">Текст отзыва:</label>
                                        <textarea id="text" name="text" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="rating">
                                            <span class="rating-label">Оценка:</span>
                                            <div class="rating-stars">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <label class="rating-star">
                                                        <input type="radio" name="rating" value="{{ $i }}" {{ $i == old('rating', 1)? 'checked' : '' }}>
                                                        <i class="fas fa-star {{ $i <= old('rating', 1)? 'checked' : '' }}"></i>
                                                    </label>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Добавить</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <br>
                @endauth
                @foreach ($anime->comments as $row)
                    <div class="card mb-3">
                        <div class="card-header">
                            <div>
                            Пользователь:
                            <strong>{{ $row->user->name }}</strong>
                            @if($row->created_at==$row->updated_at)
                                <div class="float-end">Добавлено: {{$row->created_at}}</div>
                            @else
                                <div class="float-end">Изменено: {{$row->updated_at}}</div>
                            @endif
                            </div>
                        </div>
                        <div class="card-body ">
                            <div>
                                Отзыв:<br>{{ $row->text }}
                            <br>Оценка: {{$row->rating}}
                            </div>
                        @guest()
                        @else
                            @if(auth()->user()->role=='admin')
                                <form action="{{ route('comment-del', $row->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger float-start mt-2"
                                            onclick="return confirm('Вы уверены, что хотите удалить этот комментарий?')"> Удалить
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        @endguest
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
