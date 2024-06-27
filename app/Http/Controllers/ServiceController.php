<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JsonServerService;

class ServiceController extends Controller
{
    protected $jsonServerService;

    public function __construct(JsonServerService $jsonServerService)
    {
        $this->jsonServerService = $jsonServerService;
    }
    public function index()
    {
        $reminders = $this->jsonServerService->getData('reminders', [
            'user_id' => '1',
        ]);

        $services = $this->jsonServerService->getData('services');

        $data = [
            'page' => 'Bayar tagihan pulsa dan lainya',
            'reminders' => $reminders,
            'services' => $services
        ];
        return view('homepage', $data);
    }
}
