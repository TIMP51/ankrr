@extends('layouts.header')
@section('title')
    Персонажы
@endsection
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <h2 class="panel-heading">Эпизоды</h2>
            <table class="table my-2">
                <div class="row ">
                    @foreach($episodes as $episode)
                        <a href="{{ route('episodes-show', $episode->id) }}" class="text-decoration-none text-black col-4">
                            <div class="card m-2">
                                <div class="card-body">
                                    <h5 class="">Название: <strong>{{ $episode->name }}</strong></h5>
                                    <h6>Мультфильм: {{ $episode->animation->name }}</h6>
                                    <ul class="list-group list-group-flush">
                                        <form action="{{ route('episodes-destroy', $episode->id) }}" method="get"
                                              style="display: inline-block;">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </table>
        </div>
    </div>
@endsection
