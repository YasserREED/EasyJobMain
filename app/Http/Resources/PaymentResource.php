<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tran_ref' => $this->tran_ref,
            'tran_total' => (float) $this->tran_total,
            'cart_currency' => $this->cart_currency,
            'payment_method' => $this->payment_method,
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'user' => new UserResource($this->whenLoaded('user')),
            'cv_service' => new CvServiceResource($this->whenLoaded('cvService')),
            'created_at' => $this->created_at,
        ];
    }
}
