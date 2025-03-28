<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Laravel\Scout\Searchable;

class Sphere extends Model
{
    use HasFactory, HasUlids, Searchable;

    protected $fillable = [
        'name',
        'description',
        'type',
        'core_hub_id'
    ];

    public function coreHub(): BelongsTo
    {
        return $this->belongsTo(CoreHub::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'sphere_category');
    }
}
