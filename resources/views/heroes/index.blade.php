@extends('layouts.header')
@section('title')
    Персонажы
@endsection
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <h2 class="panel-heading">Персонажи</h2>
            <table class="table my-2">
                <div class="row ">
                    @foreach($heroes as $hero)
                        <a href="{{ route('heroes-show', $hero->id) }}" class="text-decoration-none text-black col-4">
                            <div class="card m-2">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $hero->name }} {{ $hero->nickname }}</h3>
                                    <p class="">{{ $hero->animation->name }}</p>
                                    <ul class="list-group list-group-flush">
                                        <form action="{{ route('heroes-destroy', $hero->id) }}" method="get"
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

