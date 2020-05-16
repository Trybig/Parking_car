@extends('layouts.app')
@section('title')Клиенты на парковке@endsection
@section('content')
    <h1>Количество машин на парковке: {{$count}}</h1>
    <table class="table">
        <thead>
        <tr>
            <th>ФИО</th>
            <th>Гос.номер</th>
            <th>Статус автомобиля</th>
        </tr>
        </thead>
        <tbody>
        @foreach($result as $el)
            <tr>
                <td>{{$el->name}}</td>
                <td>{{$el->car_number}}</td>
                <td> <a href="{{route('delete_from_parking', $el->id)}}"><button class="btn btn-warning">Удалить с парковки</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
