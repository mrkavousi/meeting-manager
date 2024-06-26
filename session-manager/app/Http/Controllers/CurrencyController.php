<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index()
    {
        $apiUrl = 'http://nerkh-api.ir/api/323236b91792b20fe615a4ada4b68463/currency/';
        $response = Http::get($apiUrl);
        $data = $response->json();

        return view('currencies.index', ['prices' => $data['data']['prices']]);
    }
}
