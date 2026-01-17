<?php

namespace App\Listeners;

use App\Events\PaymentCompleted;
use App\Models\CvService;

class SendPaymentConfirmationEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentCompleted $event): void
    {
        $payment = $event->payment->load('user', 'cvService');

        // Send payment confirmation email
        // Mail::to($payment->user->email)->send(new PaymentConfirmation($payment));

        // Log the payment
        \Log::info('Payment completed for user', [
            'user_id' => $payment->user_id,
            'transaction_ref' => $payment->tran_ref,
            'amount' => $payment->tran_total,
        ]);
    }
}
