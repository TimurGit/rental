@extends('layout')
@section('content')
    <div class="container-fluid mrg-2em">
        <h1>Парк автомобилей</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Номер</th>
                <th>Тип</th>
                <th>Марка</th>
                <th width="300px;">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($transports as $key => $value)
                <tr>
                    <td><a href="/transports/{{$value->id}}/edit">{{ $value->reg_number }}</a></td>
                    <td>{{ $value->type_name }}</td>
                    <td>{{ $value->mark->name }}</td>
                    <td>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">Нет данных.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {!! $transports->render() !!}
        <div>
@endsection