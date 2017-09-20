@extends('layout')
@section('content')
    <div class="container-fluid mrg-2em">
        <h2>Основные данные</h2>
        <form method="POST" action="/transport/{{$transport->id}}/edit">
            {{ csrf_field() }}
            <div class="input-group">
                <label for="reg_number">Регистрационный номер</label>
                <input type="text" class="form-control" placeholder="Регистрационный номер" name="reg_number" value="{{$transport->reg_number}}">
            </div>
            <div class="input-group">
                <label for="type_id">Тип авто</label>
                <select class="form-control" id="type_id" name="type_id">
                    @foreach(\App\Models\Transport::$types_list as $key=>$item)
                        <option value="{{$key}}" {{($key==$transport->type_id) ?? 'selected="selected"'}}>{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group">
                <label for="mark_id">Тип авто</label>
                <select class="form-control" id="sel1" name="mark_id">
                    @foreach(\App\Models\Mark::all() as $item)
                        <option value="{{$key}}" {{($item->id==$transport->mark_id) ?? 'selected="selected"'}}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <hr/>
        <h2>Данные по прокату</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Дата взятия</th>
                <th>Дата возврата</th>
                <th>ФИО</th>
                <th width="300px;">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($opportunities as $key => $value)
                <tr>
                    <td><a href="/opportunities/{{$value->id}}/edit">{{ $value->start }}</a></td>
                    <td><a href="/opportunities/{{$value->id}}/edit">{{ $value->finish }}</a></td>
                    <td>{{ $value->user->name}}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->updated_at }}</td>
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

        {!! $opportunities->render() !!}
    </div>
@endsection