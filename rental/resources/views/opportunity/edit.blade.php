@extends('layout')
@section('content')
    <div class="container-fluid mrg-2em">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <h2>Основные данные</h2>
            <form method="POST" action="/opportunities/{{$opportunity->id}}/edit">
                {{ csrf_field() }}
                   <select-transport></select-transport>
                    {{--<label for="reg_number">Регистрационный номер (здесь по нормальному должен быть lookup)</label>--}}
                    {{--<input type="text" class="form-control" name="reg_number" value="{{$opportunity->reg_number}}">--}}
                <div class="form-group">
                    <label for="start">Дата начала</label>
                    <input type="text" class="form-control" name="start" value="{{$opportunity->start}}">
                </div>
                <div class="form-group">
                    <label for="finish">Дата окончания</label>
                    <input type="text" class="form-control" name="finish" value="{{$opportunity->finish}}">
                </div>
                    <select-user></select-user>
                <div class="form-group">
                    <button type="submit" class="btn">Создать</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection