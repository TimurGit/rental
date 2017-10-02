@extends('layout')
@section('content')
    <div class="container-fluid mrg-2em">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <h2>Основные данные</h2>
                <form method="POST" action="/opportunities/create">
                    {{ csrf_field() }}
                    <select-transport></select-transport>
                    <div class="input-group">
                        <label for="start">Дата начала(Пример:2016-10-03 05:31:31)</label>
                        <input type="text" class="form-control" name="start" value="">
                    </div>
                    <div class="input-group">
                        <label for="finish">Дата окончания(Пример:2016-10-03 05:31:31)</label>
                        <input type="text" class="form-control" name="finish" value="">
                    </div>
                    <select-user></select-user>
                    <div class="input-group">
                        <button type="submit" class="btn">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection