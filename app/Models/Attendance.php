<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'check_in',
        'check_out',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date:d-m-Y',
            'check_in' => 'datetime:H:i:s d-m-Y',
            'check_out' => 'datetime:H:i:s d-m-Y',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
