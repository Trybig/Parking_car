<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3',
            'gender'=>'required',
            'user_number'=>'required|unique:customers,user_number,'.$this->id,
            'value'=>'required|min:1|integer',
            'brand'=>'required',
            'model'=>'required',
            'color'=>'required',
            'car_number'=>'required|unique:cars,car_number,'.$this->id,
            'at_park'=>'required'
        ];
    }
    public function messages(){
        return[
            'name.required'=>'Поле "ФИО" является обязательным',
            'name.min'=>'Поле "ФИО" должно содержать не менее 3 символов',
            'gender.required'=>'Поле "Пол" является обязательным',
            'user_number.required'=>'Поле "Номер телефона" является обязательным',
            'user_number.unique'=>'Номер телефона уже зарегистрирован',
            'value.required'=>'Поле "Количество автомобилей" является обязательным',
            'value.min'=>'Количество автомобилей должно быть не менее 1',
            'value.integer'=>'Поле "Количество автомобилей" должно содержать только числа',
            'brand.required'=>'Поле "Брэнд" является обязательным',
            'model.required'=>'Поле "Модель" является обязательным',
            'color.required'=>'Поле "Цвет" является обязательным',
            'car_number.required'=>'Поле "Гос. номер" является обязательным',
            'car_number.unique'=>'Номер автомобиля уже зарегистрирован',
            'at_park.required'=>'Поле "Статус автомобиля" является обязательным',
        ];
    }
}
