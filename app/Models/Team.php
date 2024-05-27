<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    protected static function booted(): void
    {
        static::creating(function ($item) {
            if (!filled($item->slug)) {
                $item->slug = Str::slug($item->name);
            } else {
                $item->slug = Str::slug($item->slug);
            }
        });

        static::updating(function ($item) {
            if (!filled($item->slug)) {
                $item->slug = Str::slug($item->name);
            } else {
                $item->slug = Str::slug($item->slug);
            }
        });
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
