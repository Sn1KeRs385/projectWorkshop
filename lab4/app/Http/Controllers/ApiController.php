<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
	public function changeString(Request $request)
    {
		$client = new Client();
		$url = 'http://www.mocky.io/v2/5c7db5e13100005a00375fda';
		$response = $client->request(request()->getMethod(), $url);
		$json = $response->getBody();
		$string = json_decode($json)->result;
		$string = str_replace(' ', '_', $string);
		return response()->json([
			'url' => request()->getUri(),
			'result' => $string,
			'method' => request()->getMethod()
		], 200);
	}
}
