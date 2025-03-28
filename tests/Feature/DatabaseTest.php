<?php

use App\Models\User;
use Illuminate\Database\QueryException;
use Tests\TestCase;

class DatabaseTest extends TestCase
{

    public function test_karma_quants_constraint(): void
    {
        $this->expectException(QueryException::class);

        User::factory()->create(['karma_quants' => 600]);
    }
}
