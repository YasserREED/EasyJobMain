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


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo('App\Models\Discount');
    }
}
