<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedProviderException;
use App\Http\Requests\StorePaymentRequest;
use App\Services\PaymentServiceInterface;
use App\Services\ProviderPaymentServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Throwable;

class PaymentsController extends Controller
{
    public function __construct(
        private readonly PaymentServiceInterface $paymentServiceInterface,
        private readonly ProviderPaymentServiceInterface $providerPaymentServiceInterface
    )
    {
    }

    public function store(StorePaymentRequest $request): JsonResponse
    {
        try{
            $provider = $this->providerPaymentServiceInterface->execute();

            if($provider === 'error'){
                throw new UnauthorizedProviderException();
            }
            $this->paymentServiceInterface->store($request->all());
            return response()->json([
                'status' => 'success'
            ], Response::HTTP_OK);
        } catch(UnauthorizedProviderException $ex) {
            Log::error('Payment Unauthorized', [
                'message' => $ex->getMessage()
            ]);
            return response()->json([
                'status' => 'error',
            ], Response::HTTP_UNAUTHORIZED);
        } catch (Throwable $ex) {
            Log::error('Payment Error', [
                'message' => $ex->getMessage(),
                'trace' => $ex->getTraceAsString()
            ]);
            return response()->json([
                'status' => 'error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'todos' => [],
        ]);
    }

    public function show(string $id): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'todos' => [],
        ]);
    }
}
