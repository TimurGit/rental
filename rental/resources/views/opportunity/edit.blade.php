@extends('layout')
@section('content')
    <div class="container-fluid mrg-2em">
        <h2>Основные данные</h2>
        <form method="POST" action="/opportunities/{{$opportunity->id}}/edit">
            {{ csrf_field() }}
            <div class="input-group">
                <v-select
                        :debounce="250"
                        :on-search="getOptions"
                        :options="options"
                        :on-change="onChange"
                        :value.sync="reg_number"
                        placeholder="Регистрационный номер"
                        v-model="reg_number_list"
                >
                </v-select>
                <input type="hidden" name="transport_id" v-model="reg_number" value="{{ $opportunity->transport_id }}">
                {{--<label for="reg_number">Регистрационный номер (здесь по нормальному должен быть lookup)</label>--}}
                {{--<input type="text" class="form-control" name="reg_number" value="{{$opportunity->reg_number}}">--}}
            </div>
            <div class="input-group">
                <label for="start">Дата начала</label>
                <input type="text" class="form-control" name="start" value="{{$opportunity->start}}">
            </div>
            <div class="input-group">
                <label for="finish">Дата окончания</label>
                <input type="text" class="form-control" name="finish" value="{{$opportunity->finish}}">
            </div>
            <div class="input-group">
                <label for="user">ФИО</label>
                <v-select
                        :debounce="250"
                        :on-search="getOptionsFIO"
                        :options="userlistoptions"
                        :on-change="onChangeFIO"
                        :value.sync="user"
                        placeholder="ФИО"
                        v-model="userlist"
                >
                </v-select>
                <input type="hidden" name="user_id" v-model="user" value="{{ $opportunity->user_id }}">
            </div>
            <div class="input-group">
                <button type="submit" class="btn">Создать</button>
            </div>
        </form>
    </div>
@endsection