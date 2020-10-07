<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RateController extends Controller
{
    public function store(Request $request)
    {
        $finalData = $request->all();
        $response = Http::get(
            "https://api.exchangeratesapi.io/{$finalData['base_date']}?base={$finalData['base_currency']}&symbols={$finalData['base_currency']},{$finalData['converted_currency']}"
        );
        $finalData['converted_rate'] = floatval($response['rates'][$finalData['converted_currency']]) * floatval($finalData['base_rate']);
        $result = Rate::create($finalData);
        return response()->json($result, 201);
    }

    public function show(Int $id)
    {
        $result = Rate::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return response()->json($result, 200);
    }
}
