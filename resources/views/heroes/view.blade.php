@extends('layouts.header')
@section('title')
    {{$heroes->first_name}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class=" col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="col-4">{{ $heroes->name }}</h3>
                    </div>
                    <div class="panel-body">
                        @if($heroes->nickname!=null)
                            <p><strong>Прозвище:</strong> {{ $heroes->nickname }}</p>
                        @endif

                        <p><strong>Описание:</strong> {{ $heroes->description }}</p>
                        <div>
                            <strong>Мультфильм</strong>
                            <form class="col" action="{{ route('anime-view', $heroes->animation->id) }}" method="get"
                                  style="display: inline-block;">
                                <button type="submit" class="btn btn-outline-dark">
                                    {{$heroes->animation->name}}</button>
                            </form>
                        </div>
                        <div>
                            <strong>Актер</strong>
                            @if(!empty($heroes->actor->id))
                            <form class="col mt-2" action="{{ route('actors-show', $heroes->actor->id) }}" method="get"
                                  style="display: inline-block;">
                                <button type="submit" class="btn btn-outline-dark">
                                    {{$heroes->actor->last_name}} {{$heroes->actor->first_name}}</button>
                            </form>
                            @endif
                        </div>
                        @guest()
                        @else
                            @if(auth()->user()->role=='admin')
                                <a href="{{route('heroes-edit',$heroes->id)}}" class="btn btn-success mt-2">
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
