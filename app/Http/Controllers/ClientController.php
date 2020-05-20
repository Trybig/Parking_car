<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Parking;
class ClientController extends Controller
{

 public function get_all(){
     $client =  new Parking();
     return $client->get_all();
 }
    public function submit(ClientRequest $req){
        $client =  new Parking();
        return $client->submit($req);
    }
    public function delete_client($id){
        $client =  new Parking();
        return $client->delete_client($id);
    }
    public function update_client($id){
        $client =  new Parking();
        return $client->update_client($id);
    }
    public function  upd_submit($id,ClientRequest $req){
        $client =  new Parking();
        return $client->upd_submit($id,$req);
    }
    public function at_parking(){
        $client =  new Parking();
        return $client->at_parking();
    }
    public function delete_from_parking($id){
        $client =  new Parking();
        return $client->delete_from_parking($id);
    }
    public function add_to_park($id){
        $client =  new Parking();
        return $client->add_to_park($id);
    }
}

