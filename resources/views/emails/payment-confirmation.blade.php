@component('mail::message')
# Payment Confirmation

Dear {{ $payment->customer_name }},

Your payment has been successfully processed.

@component('mail::panel')
**Transaction Details:**
- Reference: {{ $payment->tran_ref }}
- Amount: {{ $payment->tran_total }} {{ $payment->cart_currency }}
- Method: {{ $payment->payment_method }}
- Date: {{ $payment->created_at->format('Y-m-d H:i:s') }}
@endcomponent

@component('mail::button', ['url' => config('app.url')])
View Your CV Services
@endcomponent

Thank you for using EasyJob!

Best regards,
{{ config('app.name') }}
@endcomponent