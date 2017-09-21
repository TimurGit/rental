@extends('layout')
@section('content')
<div class="container-fluid mrg-2em">
    <h1>История проекта</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Дата взятия</th>
            <th>Дата сдачи</th>
            <th>Рег. номер</th>
            <th>Тип авто</th>
            <th>Марка</th>
            <th>ФИО</th>
        </tr>
        </thead>
        <tbody>
            @forelse($data as $key => $value)
                <tr>
                    <td>{{ $value->start}}</td>
                    <td>{{ $value->finish or ''}}</td>
                    <td><a href="/transports/{{$value->transport->id}}/edit">{{ $value->transport->reg_number }}</a></td>
                    <td>{{ $value->transport->type_name }}</td>
                    <td>{{ $value->transport->mark->name }}</td>
                    <td>{{ $value->user->name }}</td>
                </tr>
            @empty
            <tr>
                <td colspan="10">Нет данных.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {!! $data->render() !!}
<div>
@endsection