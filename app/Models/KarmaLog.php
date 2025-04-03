<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids; // Import HasUlids trait
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User; // Ensure User is imported

class KarmaLog extends Model
{
    use HasFactory, HasUlids; // Add HasUlids trait

    protected $fillable = [
        'user_id',
        'karma_points',
        'action',
        'description',
    ];

    protected $casts = [
        'karma_points' => 'integer', // Ensure karma_points is cast to an integer
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
