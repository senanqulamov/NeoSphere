<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The spheres that belong to the category.
     */
    public function spheres(): BelongsToMany
    {
        return $this->belongsToMany(Sphere::class, 'sphere_category');
    }
}
