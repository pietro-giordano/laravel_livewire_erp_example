<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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

    /**
     * scope a query that return last attendance
     */
    public function scopeLastAttendance(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId)
            ->orderByDesc('created_at');
    }

    /**
     * scope a query that return last daily attendance
     */
    public function scopeLastDailyAttendance(Builder $query, int $userId): Builder
    {
        return $this->scopeLastAttendance($query, $userId)
            ->where('date', Carbon::today());
    }
}
