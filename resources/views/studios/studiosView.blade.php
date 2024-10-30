@extends('layouts.header')
@section('title')
    Студии
@endsection
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <h2 class="panel-heading">Студии</h2>
            <table class="table my-2">
                <div class="row ">
                    @foreach($studios as $row)
                        <a href="{{route('studios-view-one', $row->id)}}"
                           class="text-decoration-none text-black col-4">
                            <div class="card m-2">
                                <div class="card-body">
                                    <div class="form-group">
                                        <lable for="name">Название студии</lable>
                                        <h5 class="text-black">{{$row['name']}}</h5>
                                    </div>
                                    <div class="form-group">
                                        <lable for="name">Название страны</lable>
                                        <h5 class="text-black">{{$row->country->name}}</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <form action="{{route('studios-view-delete', $row->id)}} " method="get"
                                              style="display: inline-block;">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </ul>
                                </div>
                            </div>
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
