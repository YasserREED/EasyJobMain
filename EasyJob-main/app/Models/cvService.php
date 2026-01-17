<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class cvService extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'region',
        'domain',
        'cv_file',
        'plan',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function cvPath(){
        return \Storage::url("CVs/".$this->cv_file);
    }

    public function planText(){

        switch ($this->plan) {
            case 1:
                $result = '<span class="badge badge-primary">بريميوم</span>';
                break;
            case 2:
                $result = '<span class="badge badge-warning">بريميوم بلس</span>';
                break;
            case 3:
                $result = '<span class="badge badge-dark">بريميوم برو</span>';
                break;
            default:
            $result = '<span class="badge badge-secondary">Unknown</span>';
        }
        return $result;
    }


    public function regionText(){
        switch ($this->region) {
            case 1:
                $result = 'المنطقة الوسطى';
                break;
            case 2:
                $result = 'المنطقة الغربية';
                break;
            case 3:
                $result = 'المنطقة الشرقية';
                break;
            default:
            $result = 'Unknown';
        }
        return $result;
    }
}
