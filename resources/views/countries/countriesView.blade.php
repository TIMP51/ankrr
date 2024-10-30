@extends('layouts.header')
@section('title')
    Страны
@endsection
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <h2 class="panel-heading">Страны</h2>
            <table class="table my-2">
                <div class="row ">
                    @foreach($name as $row)
                        <a href="{{ route('countries-view-one', $row->id) }}"
                           class="text-decoration-none text-black col-4">
                            <div class="card m-2">
                                <div class="card-body">
                                    <h5 class="text-center">{{$row->name}}</h5>
                                    <ul class="list-group list-group-flush">
                                        <form action="{{route('countries-view-delete', $row->id)}}" method="get"
                                              style="display: inline-block;">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </a>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                        @if(session('error'))
                            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                                     data-autohide="false">
                                    <div class="toast-header">
                                        <div class="col-md-11">
                                            <strong class="mr-auto">Ошибка</strong>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast"
                                                aria-label="Close"></button>

                                    </div>
                                    <div class="toast-body">
                                        {{ session('error') }}
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function () {
                                    $('.toast').toast('show');
                                });
                            </script>
                        @endif
                </div>
            </table>
        </div>
    </div>
@endsection
