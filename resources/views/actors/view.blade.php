@extends('layouts.header')
@section('title')
    {{$actors->first_name}}
@endsection
@section('content')
    <div class="container mx-auto">
        <h3 class="col-4">{{ $actors->first_name }} {{ $actors->last_name }}</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- картинка -->
                <img id="image" src="{{ asset('images/'.$actors->image) }}" class="card-img-top"
                     alt="{{ $actors->name }}"
                     style="max-width: 95%; height: auto">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if($actors->father_name!=null)
                            <p><strong>Отчество:</strong> {{ $actors->father_name }}</p>
                        @endif
                        <h4>Место рождения: <strong>{{$actors->country->name}}</strong></h4>
                            <div class="datetime">
                        <h4>Дата рождения: <strong>{{ \Jenssegers\Date\Date::parse($actors->birth)->format('j F Y') }}</strong></h4>
                            </div>
                            <h4>Персонажи</h4>
                            <ul>
                                @foreach($actors->heroes as $hero)
                                    <li>
                                        <a class="text-black text-decoration-none link-primary"
                                           href="{{ route('heroes-show', $hero->id) }}">{{$hero->name}}
                                            {{$hero->nickname}}</a>
                                        @if(!empty($hero->animation->id))
                                            <a class="text-black text-decoration-none link-primary"
                                               href="{{ route('anime-view', $hero->animation->id) }}">({{$hero->animation->name}})
                                            </a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @guest()
                        @else
                            @if(auth()->user()->role=='admin')
                                <a href="{{route('actors-edit',$actors->id)}}" class="btn btn-success mt-2">
                                    {{__('Изменить')}}
                                </a>
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
