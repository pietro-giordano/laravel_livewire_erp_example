<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * More readable constants
     */
    public const IS_HR = 1;
    public const IS_MANAGER = 2;
    public const IS_EMPLOYEE = 3;

    /**
     * Get the users for role.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
