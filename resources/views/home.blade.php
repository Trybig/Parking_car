@extends('layouts.app')
@section('title')Все клиенты@endsection
@section('content')
    <h1>Все клиенты</h1>
    <table class="table">
        <thead>
        <tr>
            <th>ФИО</th>
            <th>Марка машины</th>
            <th>Гос.номер</th>
            <th>Удаление</th>
            <th>Редактирование</th>
            <th>Статус автомобиля</th>
        </tr>
        </thead>
        <tbody>
        @foreach($res as $el)
            <tr>
                <td>{{$el->name}}</td>
                <td>{{$el->brand}}</td>
                <td>{{$el->car_number}}</td>
                <td> <a href="{{route('delete-client', $el->id)}}"><button class="btn btn-danger">Удалить</button></a></td>
                <td> <a href="{{route('update-client', $el->id)}}"><button class="btn btn-info">Редактировать</button></a></td>
                <td> <a href="{{route('add_to_park', $el->id)}}"><button class="btn btn-warning">Добавить</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$res->links()}}
@endsection

