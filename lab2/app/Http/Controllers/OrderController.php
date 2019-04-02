<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function Get(){
        return response()->json(Order::with('client', 'service')->get(), 200);
    }

    public function Create(){
        Order::create([
            'client_id' => request()->client_id,
            'service_id' => request()->service_id
        ]);
        return response()->json(['result' => 'Запись добавлена'], 201);
    }

    public function Update(){
        if(!$order = Order::find(request()->id))
            return response()->json(['result' => 'Запись не найдена'], 404);
        $order->client_id = request()->client_id;
        $order->service_id = request()->service_id;
        $order->save();
        return response()->json(['result' => 'Запись обновлена'], 200);
    }

    public function Delete(){
        if(!$order = Order::find(request()->id))
            return response()->json(['result' => 'Запись не найдена'], 404);
        $order->delete();
        return response()->json(['result' => 'Запись удалена'], 200);
    }
}