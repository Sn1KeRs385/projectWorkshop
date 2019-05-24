<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class RequestsController extends Controller
{
    public function index(){
        $http = new Client();
        $url = "http://server/api/requests";
        $response = $http->request("GET", $url);
        $json = $response->getBody();
        $result = json_decode($json);
        return view('requests.index', ['result' => $result]);
    }

    public function create($clientId, $serviceId){
        $http = new Client();
        $url = "http://server/api/requests";
        $myBody['client_id'] = $clientId;
        $myBody['service_id'] = $serviceId;
        $request = $http->post($url,  ['body'=>$myBody]);
        $request->send();
        return redirect('/requests');
    }

    public function update($id, $clientId, $serviceId){
        $http = new Client();
        $url = "http://server/api/requests/$id";
        $myBody['client_id'] = $clientId;
        $myBody['service_id'] = $serviceId;
        $request = $http->put($url,  ['body'=>$myBody]);
        $request->send();
        return redirect('/requests');
    }

    public function delete($id){
        $http = new Client();
        $url = "http://server/api/requests/$id";
        $request = $http->delete($url);
        $request->send();
        return redirect('/requests');
    }
}