<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cv_service',
        'discount_id',
        'tran_ref',
        'cart_description',
        'cart_currency',
        'tran_total',
        'customer_name',
        'customer_email',
        'payment_method',
        'trace',
    ];

    /**
     * Get the user that made this payment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the CV service for this payment.
     */
    public function cvService(): BelongsTo
    {
        return $this->belongsTo(CvService::class, 'cv_service');
    }

    /**
     * Get the discount used in this payment.
     */
    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
}
