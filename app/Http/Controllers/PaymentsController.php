<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;

class PaymentsController extends Controller
{
    public function store(StorePaymentRequest $request)
    {

        return response()->json([
            'status' => 'success',
            'todos' => [],
        ]);
    }

    public function index()
    {
        return response()->json([
            'status' => 'success',
            'todos' => [],
        ]);
    }
}
