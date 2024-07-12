<?php

namespace App\Http\Controllers;

use App\Enums\FeesType;
use App\Exceptions\ProviderException;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Responses\PaymentResponse;
use App\Services\MerchantServiceInterface;
use App\Services\PaymentServiceInterface;
use App\Services\ProviderServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Throwable;

class PaymentsController extends Controller
{
    public function __construct(
        private readonly PaymentServiceInterface  $paymentServiceInterface,
        private readonly ProviderServiceInterface $providerServiceInterface,
        private readonly MerchantServiceInterface $merchantServiceInterface
    )
    {
    }

    public function store(StorePaymentRequest $request): JsonResponse
    {
        $data = $request->all();

        $data['id'] = Uuid::uuid4();
        $data['status'] = 'pending';

        $payment = $this->paymentServiceInterface->store($data);

        $providerSuccess = $this->providerServiceInterface->execute();
        $status = $providerSuccess ? 'paid' : 'failed';

        $updatedPayment = $this->paymentServiceInterface->updateStatus($payment->id, $status);

        if ($status === 'failed') {
            return response()->json([
                'status' => 'error',
                'data' => PaymentResponse::fromPaymentDto($updatedPayment),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        if ($status === 'paid') {
            DB::beginTransaction();

            try {
                $feeType = FeesType::fromSlug($data['payment_method']);
                $fee = $feeType->fee();
                $value = $data['amount'];
                $amount = $value - (($value * $fee) / 100);

                $this->merchantServiceInterface->updateBalance(auth()->id(), $amount);

                DB::commit();

            } catch (\Exception $e) {

                DB::rollBack();

                $this->paymentServiceInterface->updateStatus($payment->id, 'failed');

                return response()->json([
                    'status' => 'error',
                    'message' => 'An error occurred while updating merchant balance.',
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        return response()->json([
            'status' => 'success',
            'data' => PaymentResponse::fromPaymentDto($updatedPayment),
        ], Response::HTTP_OK);
    }

    public function index(): JsonResponse
    {
        try {
            $payments = $this->paymentServiceInterface->getAll();
            return response()->json([
               'status' => 'success',
               'data' => $payments
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            Log::error('Payment Index Error', [
               'message' => $e->getMessage(), 'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
               'status' => 'error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(string $id): JsonResponse
    {
        try {
            $payment = $this->paymentServiceInterface->getById($id);
            return response()->json([
                'status' => 'success',
                'data' => PaymentResponse::fromPaymentDto($payment),
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            Log::error('Payment Show Error', [
                'message' => $e->getMessage(), 'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'status' => 'error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
