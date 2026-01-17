<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Get all payments for the authenticated user.
     */
    public function index(Request $request)
    {
        $payments = Payment::where('user_id', $request->user()->id)
            ->with('user', 'cvService')
            ->latest()
            ->paginate(15);

        return PaymentResource::collection($payments);
    }

    /**
     * Get a specific payment by ID.
     */
    public function show(Request $request, string $id): PaymentResource|void
    {
        $payment = Payment::findOrFail($id);

        // Authorization
        if ($payment->user_id !== $request->user()->id) {
            abort(403, 'Unauthorized');
        }

        return new PaymentResource($payment->load('user', 'cvService'));
    }
}
