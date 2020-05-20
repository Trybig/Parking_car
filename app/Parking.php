<?php

namespace App;

use App\Http\Requests\ClientRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parking extends Model
{
    public function submit(ClientRequest $req){
        $name=$req->input('name');
        $gender=$req->input('gender');
        $user_number=$req->input('user_number');
        $user_adress=$req->input('user_adress');
        $count=$req->input('value');

        $brand=$req->input('brand');
        $model=$req->input('model');
        $color=$req->input('color');
        $car_number=$req->input('car_number');
        $at_park=$req->input('at_park');

        $post = DB::table('customers')->insert([
            'name' => $name,
            'gender' => $gender,
            'user_number' => $user_number,
            'user_adress' => $user_adress,
            'count' => $count
        ]);
        $post= DB::table('cars')->insert([
            'brand' => $brand,
            'model' => $model,
            'color' => $color,
            'car_number' => $car_number,
            'at_park' => $at_park
        ]);
        return redirect()->route('home')->with('success','Клиент был добавлен');
    }
    public function get_all(){
        $all = DB::table('customers')
            ->select('customers.id','customers.name','cars.brand','cars.car_number')
            ->join('cars', 'customers.id', '=', 'cars.id')->paginate(5);
        //->get();
        return view('home', ['res' => $all]);
    }
    public function delete_client($id){
        DB::table('customers')->where('id', '=', $id)->delete();
        DB::table('cars')->where('id', '=', $id)->delete();

        return redirect()->route('home')->with('success','Клиент был удален');
    }
    public function update_client($id){

        $all = DB::table('customers')
            ->select('customers.*','cars.*')
            ->join('cars','customers.id','=','cars.id')
            ->WHERE('customers.id','=',$id)
            ->first();
        return view('update', ['res' => $all]);


    }
    public function  upd_submit($id,ClientRequest $req){
        $name = $req->input('name');
        $gender=$req->input('gender');
        $user_number=$req->input('user_number');
        $user_adress=$req->input('user_adress');
        $count=$req->input('value');

        $brand=$req->input('brand');
        $model=$req->input('model');
        $color=$req->input('color');
        $car_number=$req->input('car_number');
        $at_park=$req->input('at_park');


        $post=DB::table('customers')
            ->where('id', '=',$id)
            ->update([
                'name' => $name,
                'gender' => $gender,
                'user_number' => $user_number,
                'user_adress' => $user_adress,
                'count' => $count
            ]);
        $post=DB::table('cars')
            ->where('id', '=',$id)
            ->update([
                'brand' => $brand,
                'model' => $model,
                'color' => $color,
                'car_number' => $car_number,
                'at_park' => $at_park
            ]);

        return redirect()->route('home')->with('success','Данные Клиента были обновлены');
    }
    public function at_parking(){
        $count= DB::table('cars')
            ->select(DB::raw('count(at_park)'))
            ->WHERE ('at_park','=','yes')
            ->count();

        $all = DB::table('customers')
            ->select('customers.id','customers.name','cars.car_number')
            ->join('cars', 'customers.id', '=', 'cars.id')
            ->where('cars.at_park','=','yes')
            ->get();
        return view('at_parking', ['result' => $all],['count'=> $count]);
    }
    public function delete_from_parking($id){
        $post=DB::table('cars')
            ->where('id', '=',$id)
            ->update([
                'at_park' => 'no'
            ]);
        return redirect()->route('at_parking')->with('success','Клиент был удален');
    }
    public function add_to_park($id){
        $post=DB::table('cars')
            ->where('id', '=',$id)
            ->update([
                'at_park' => 'yes'
            ]);
        return redirect()->route('at_parking')->with('success','Клиент был добавлен на парковку');
    }
}
