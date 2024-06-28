<?php

namespace App\Http\Controllers;

use App\Services\JsonServerService;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PaymentController extends Controller
{
    protected $jsonServerService;

    public function __construct(JsonServerService $jsonServerService)
    {
        $this->jsonServerService = $jsonServerService;
    }

    public function index(Request $request)
    {
        $request->validate([
            'selected_price' => 'required|string',
            'phone_number' => 'required|string'
        ]);

        $order = null;

        // konfigurasi untuk ipaymu
        $va = '0000003192777446';
        $apiKey = 'SANDBOX40CB882E-B91F-4E2A-BCA9-AF9C0D7A0BB9';
        $url = 'https://sandbox.ipaymu.com/api/v2/payment';
        $method = 'POST';

        $product = $this->jsonServerService->getData('data_packets', [
            'id' => $request->selected_price
        ]);

        $product = $product[0];

        // untuk detail barang
        $products = (array) $product['description'];
        $quantities = [1];
        $prices = (array) $product['price'];

        // ini akan dikirim ke ipaymu
        $body = [
            'product' => $products,
            'qty' => $quantities,
            'price' => $prices,
            'returnUrl' => 'http://127.0.0.1:8000/homepage',
            'notifyUrl' => 'https://your-website.com/cancel-page',
            'cancelUrl' => 'https://your-website.com/cancel-page',
            'referenceId' => 'https://your-website.com/callback-url'
        ];

        $jsonBody = json_encode($body, JSON_UNESCAPED_SLASHES);
        $requestBody = strtolower(hash('sha256', $jsonBody));
        $stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $apiKey;
        $signature = hash_hmac('sha256', $stringToSign, $apiKey);
        $timestamp = now()->format('YmdHis');

        $client = new Client();
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'va' => $va,
            'signature' => $signature,
            'timestamp' => $timestamp
        ];

        try {
            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'body' => $jsonBody
            ]);
            $ret = json_decode($response->getBody()->getContents());

            if ($ret && $ret->Status == 200) {
                $sessionId = $ret->Data->SessionID;
                $paymentUrl = $ret->Data->Url;

                return redirect($paymentUrl);
            } else {
                return back()->withErrors(['payment' => 'Payment initiation failed. Please try again.'])->with('response', $ret);
            }
        } catch (RequestException $e) {
            return back()->withErrors(['payment' => 'HTTP Request Error: ' . $e->getMessage()]);
        }
    }
}
