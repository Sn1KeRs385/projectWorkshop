<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ServicesController extends Controller
{
    public function index(){
        $http = new Client();
        $url = "http://server/api/services";
        $response = $http->request("GET", $url);
        $json = $response->getBody();
        $result = json_decode($json);
        return view('services.index', ['result' => $result]);
    }

    public function create($name){
        $http = new Client();
        $url = "http://server/api/services";
        $myBody['name'] = $name;
        $request = $http->post($url,  ['body'=>$myBody]);
        $request->send();
        return redirect('/services');
    }

    public function update($id, $name){
        $http = new Client();
        $url = "http://server/api/services/$id";
        $myBody['name'] = $name;
        $request = $http->put($url,  ['body'=>$myBody]);
        $request->send();
        return redirect('/services');
    }

    public function delete($id){
        $http = new Client();
        $url = "http://server/api/services/$id";
        $request = $http->delete($url);
        $request->send();
        return redirect('/services');
    }
}