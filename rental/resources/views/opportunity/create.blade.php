@extends('layout')
@section('content')
    <div class="container-fluid mrg-2em">
        <h2>Основные данные</h2>
        <form method="POST" action="/opportunities/create">
            {{ csrf_field() }}
            <div class="input-group">
                <v-select
                        :debounce="250"
                        :on-search="getOptions"
                        :options="options"
                        :on-change="onChange"
                        placeholder="Регистрационный номер"
                        v-model="reg_number_list"
                >
                </v-select>
                <input type="hidden" name="transport_id" v-model="reg_number">
                {{--<label for="reg_number">Регистрационный номер (здесь по нормальному должен быть lookup)</label>--}}
                {{--<input type="text" class="form-control" name="reg_number" value="{{$opportunity->reg_number}}">--}}
            </div>
            <div class="input-group">
                <label for="start">Дата начала(Пример:2016-10-03 05:31:31)</label>
                <input type="text" class="form-control" name="start" value="">
            </div>
            <div class="input-group">
                <label for="finish">Дата окончания(Пример:2016-10-03 05:31:31)</label>
                <input type="text" class="form-control" name="finish" value="">
            </div>
            <div class="input-group">
                <label for="user">ФИО</label>
                <v-select
                        :debounce="250"
                        :on-search="getOptionsFIO"
                        :options="userlistoptions"
                        :on-change="onChangeFIO"
                        placeholder="ФИО"
                        v-model="userlist"
                >
                </v-select>
                <input type="hidden" name="user_id" v-model="user">
            </div>
            <div class="input-group">
                <button type="submit" class="btn">Создать</button>
            </div>
        </form>
    </div>
@endsection