<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CvFree extends Model
{
    use HasFactory;

    protected $table = 'cv_frees';

    protected $fillable = [
        'user_id',
        'subject',
        'region',
        'domain',
        'cv_file',
    ];

    /**
     * Get the user that owns this CV.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the CV file path.
     */
    public function cvPath(): string
    {
        return \Storage::url("CVs/" . $this->cv_file);
    }

    /**
     * Get the plan text badge.
     */
    public function planText(): string
    {
        return '<span class="badge badge-info">الباقة المجانية</span>';
    }

    /**
     * Get the region text.
     */
    public function regionText(): string
    {
        return match ($this->region) {
            1 => 'المنطقة الوسطى',
            2 => 'المنطقة الغربية',
            3 => 'المنطقة الشرقية',
            default => 'غير معروفة',
        };
    }

    /**
     * Scope: Get CVs for a specific user.
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
