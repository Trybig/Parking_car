@extends('layouts.app')

@section('title')Добавление клиента@endsection

@section('content')

    <h1>Данные Клиента:</h1>
    <form action="{{route('form-control')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Введите ФИО</label>
            <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="gender">Укажите пол</label> <br/>
        <input type="radio"  name="gender" value="male"/>
            <span> мужской</span>
        <input type="radio"  name="gender" value="female" />
            <span> женский</span>
        </div>

        <div class="form-group">
            <label for="user_number">Введите номер телефона</label>
            <input type="text" name="user_number" placeholder="Введите номер телефона" id="user_number" class="form-control">
        </div>

        <div class="form-group">
            <label for="user_adress">Введите адрес</label>
            <input type="text" name="user_adress" placeholder="Введите адрес" id="user_adress" class="form-control">
        </div>

        <div class="form-group">
            <label for="value">Введите количество автомобилей</label>
            <input type="text" name="value" placeholder="Введите количество автомобилей" id="value" class="form-control">
        </div>
        <h1>Данные Автомобиля:</h1>
        <div class="form-group">
            <label for="brand">Введите марку автомобиля</label>
            <input type="text" name="brand" placeholder="Введите марку автомобиля" id="brand" class="form-control">
        </div>

        <div class="form-group">
            <label for="model">Введите модель автомобиля</label>
            <input type="text" name="model" placeholder="Введите модель автомобиля" id="model" class="form-control">
        </div>

        <div class="form-group">
            <label for="color">Введите цвет автомобиля</label>
            <input type="text" name="color" placeholder="Введите цвет автомобиля" id="color" class="form-control">
        </div>

        <div class="form-group">
            <label for="car_number">Введите гос.номер автомобиля</label>
            <input type="text" name="car_number" placeholder="Введите гос.номер автомобиля" id="car_number" class="form-control">
        </div>

        <div class="form-group">
            <label for="at_park">Статус автомобиля</label> <br/>
            <input type="radio"  name="at_park" value="yes"/>
            <span>На стоянке </span>
            <input type="radio"  name="at_park" value="no" />
            <span>Не на стоянке</span>
        </div>

        <button type="submit" class="btn btn-success">Добавить</button>
        <br/><br/>
    </form>
@endsection
