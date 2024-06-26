<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CurrencyController extends Controller
{
    public function index()
    {
        $apiUrl = 'http://nerkh-api.ir/api/323236b91792b20fe615a4ada4b68463/currency/';

        $client = new Client([
            'verify' => true,
            'debug' => false,
        ]);

        try {
            $response = $client->request('GET', $apiUrl);
            $data = json_decode($response->getBody(), true);

            if ($response->getStatusCode() == 200 && isset($data['data']['prices'])) {
                return view('currencies.index', ['prices' => $data['data']['prices']]);
            } else {
                return view('currencies.index', ['prices' => []])
                       ->with('error', 'Unable to fetch currency prices.');
            }
        } catch (\Exception $e) {
            return view('currencies.index', ['prices' => []])
                   ->with('error', 'Error fetching currency prices: ' . $e->getMessage());
        }
    }
}
