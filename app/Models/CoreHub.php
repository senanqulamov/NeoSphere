<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Laravel\Scout\Searchable;

class CoreHub extends Model
{
    use HasFactory , HasUlids;

    protected $fillable = ['name', 'description'];

    public function spheres(): HasMany
    {
        return $this->hasMany(Sphere::class);
    }
}
