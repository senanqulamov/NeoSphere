<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Laravel\Scout\Searchable;
use App\Models\KarmaLog;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'email',
        'password',
        'title',
        'karma_points',
        'karma_quants',
        'profile_picture',
        'bio',
        'is_verified',
        'is_admin',
    ];

    protected $casts = [
        'karma_points' => 'integer',
    ];

    // Relationships
    public function spheres(): BelongsToMany
    {
        return $this->belongsToMany(Sphere::class, 'sphere_users');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Get the karma logs for the user.
     */
    public function karmaLogs(): HasMany
    {
        return $this->hasMany(KarmaLog::class, 'user_id', 'id');
    }

    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn(string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }
}
