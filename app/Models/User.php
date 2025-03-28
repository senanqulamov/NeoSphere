<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasFactory, HasUlids, Searchable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'title',
        'karma_points',
        'karma_quants'
    ];

    // Relationships
    public function spheres(): HasMany
    {
        return $this->hasMany(Sphere::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function karmaLogs(): HasMany
    {
        return $this->hasMany(KarmaLog::class);
    }
}
