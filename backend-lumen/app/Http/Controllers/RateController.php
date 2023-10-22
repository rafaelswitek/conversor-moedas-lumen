<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RateController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $response = Http::withHeaders([
            'Content-Type' => 'text/plain',
            'apikey' => getenv('API_LAYER_KEY'),
        ])->get("https://api.apilayer.com/exchangerates_data/convert?from={$data['base_currency']}&to={$data['converted_currency']}&amount={$data['base_rate']}");
        if (!$response->ok()) {
            return response()->json($response->body(), $response->status());
        }
        $json = $response->json();
        $data['converted_rate'] = floatval($json['result']);
        $result = Rate::create($data);
        return response()->json($result, 201);
    }

    public function show(Int $id)
    {
        $result = Rate::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return response()->json($result, 200);
    }
}
