<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RateController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'base_currency' => 'required|string',
            'converted_currency' => 'required|string',
            'base_rate' => 'required|numeric',
        ]);

        $response = Http::withHeaders([
            'Content-Type' => 'text/plain',
            'apikey' => getenv('API_LAYER_KEY'),
        ])->get("https://api.apilayer.com/exchangerates_data/convert", [
            'from' => $data['base_currency'],
            'to' => $data['converted_currency'],
            'amount' => $data['base_rate'],
        ]);

        if (!$response->ok()) {
            return response()->json(['message' => 'API request failed'], $response->status());
        }

        $result = Rate::create(array_merge($data, ['converted_rate' => $response['result']]));
        return response()->json($result, 201);
    }

    public function show(int $id)
    {
        $result = Rate::where('user_id', $id)->orderByDesc('created_at')->get();
        return response()->json($result, 200);
    }
}
