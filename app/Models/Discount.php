<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['coupon', 'discount', 'count', 'status'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get all payments using this discount.
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Scope: Get only active discounts.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
