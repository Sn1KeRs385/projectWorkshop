<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function Get(){
        return response()->json(Client::all(), 200);
    }

    public function Create(){
        Client::create(['name' => request()->name]);
        return response()->json(['result' => 'Запись добавлена'], 201);
    }

    public function Update(){
        if(!$client = Client::find(request()->id))
            return response()->json(['result' => 'Запись не найдена'], 404);
        $client->name = request()->name;
        $client->save();
        return response()->json(['result' => 'Запись обновлена'], 200);
    }

    public function Delete(){
        if(!$client = Client::find(request()->id))
            return response()->json(['result' => 'Запись не найдена'], 404);
        $client->delete();
        return response()->json(['result' => 'Запись удалена'], 200);
    }
}