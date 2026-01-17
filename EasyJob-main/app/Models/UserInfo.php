<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'age',
        'qualifications',
        'university',
        'major',
        'birthDay',
        'gender',
        'socialStatus',
        'work',
        'experince',
        'nationality',
        'linkedin',

    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
