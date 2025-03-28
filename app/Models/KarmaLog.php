<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarmaLog extends Model
{
    /** @use HasFactory<\Database\Factories\KarmaLogFactory> */
    use HasFactory;

    protected $fillable = ['points', 'reason']; // Add points to fillable
}
