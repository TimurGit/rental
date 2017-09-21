@extends('layout')
@section('content')
    <div class="container-fluid mrg-2em">
        <h2>Основные данные</h2>
        <form method="POST" action="/opportunities/{{$opportunity->id}}/edit">
            {{ csrf_field() }}
            <div class="input-group">
                <label for="reg_number">Регистрационный номер (здесь по нормальному должен быть lookup)</label>
                <input type="text" class="form-control" name="reg_number" value="{{$opportunity->reg_number}}">
            </div>
            <div class="input-group">
                <label for="reg_number">Дата начала</label>
                <input type="text" class="form-control" name="start" value="{{$opportunity->start}}">
            </div>
            <div class="input-group">
                <label for="reg_number">Дата окончания</label>
                <input type="text" class="form-control" name="finish" value="{{$opportunity->finish}}">
            </div>
            <div class="input-group">
                <label for="reg_number">ФИО</label>
                <input type="text" class="form-control" name="user" value="{{$opportunity->user->name}}">
            </div>
        </form>
    </div>
@endsection