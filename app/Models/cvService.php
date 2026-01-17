<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CvService extends Model
{
    use HasFactory;

    protected $table = 'cv_services';

    protected $fillable = [
        'user_id',
        'subject',
        'region',
        'domain',
        'cv_file',
        'plan',
    ];

    /**
     * Get the user that owns this CV service.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all payments for this CV service.
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
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
        return match ($this->plan) {
            1 => '<span class="badge badge-primary">بريميوم</span>',
            2 => '<span class="badge badge-warning">بريميوم بلس</span>',
            3 => '<span class="badge badge-dark">بريميوم برو</span>',
            default => '<span class="badge badge-secondary">غير معروف</span>',
        };
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
        return $result;
    }
}
