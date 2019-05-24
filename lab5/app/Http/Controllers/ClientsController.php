<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ClientsController extends Controller
{
    public function index(){
        $http = new Client();
        $url = "http://server/api/clients";
        $response = $http->request("GET", $url);
        $json = $response->getBody();
        $result = json_decode($json);
        return view('clients.index', ['result' => $result]);
    }

    public function create($name){
        $http = new Client();
        $url = "http://server/api/clients";
        $myBody['name'] = $name;
        $request = $http->post($url,  ['body'=>$myBody]);
        $request->send();
        return redirect('/clients');
    }

    public function update($id, $name){
        $http = new Client();
        $url = "http://server/api/clients/$id";
        $myBody['name'] = $name;
        $request = $http->put($url,  ['body'=>$myBody]);
        $request->send();
        return redirect('/clients');
    }

    public function delete($id){
        $http = new Client();
        $url = "http://server/api/clients/$id";
        $request = $http->delete($url);
        $request->send();
        return redirect('/clients');
    }
}