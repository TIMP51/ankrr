@extends('layouts.header')
@section('title')
    {{$episodes->first_name}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class=" col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="col-4">{{ $episodes->name }}</h3>

                    </div>
                    <div class="panel-body">
                        <p><strong>Описание:</strong> {{ $episodes->description }}</p>
                            <div class="row col-2">
                                <p class="col my-1"><strong>Мультфильм</strong>
                                <form class="col" action="{{ route('anime-view', $episodes->animation->id) }}" method="get"
                                      style="display: inline-block;">
                                    <button type="submit" class="btn btn-outline-dark">
                                        {{$episodes->animation->name}}</button>
                                </form>
                            </div>
                            </p>
                        @if(isset($episodes->video))
                            <video width="640" height="480" controls>
                                <source src="{{ asset('storage/'.$episodes->video)}}" type="video/mp4">
                            </video>
                            <br>
                        @endif
                        <a href="{{route('episodes-edit',$episodes->id)}}" class="btn btn-success">
                            {{__('Изменить')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
