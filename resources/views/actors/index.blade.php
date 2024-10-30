@extends('layouts.header')
@section('title')
    Актеры
@endsection
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <h2 class="panel-heading">Актеры</h2>
            <table class="table my-2">
                <div class="row ">
                    @foreach($actors as $actor)
                        <a href="{{ route('actors-show', $actor->id) }}" class="text-decoration-none text-black col-4">
                            <div class="card m-2">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $actor->last_name }} {{ $actor->first_name }} </h3>

                                    <ul class="list-group list-group-flush">
                                        <form action="{{ route('actors-destroy', $actor->id) }}" method="get"
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

