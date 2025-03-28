<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Event::with('sphere', 'organizer')->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|in:local,virtual',
            'sphere_id' => 'required|exists:spheres,id',
            'karma_reward' => 'required|integer|min:1'
        ]);

        $event = Event::create([
            ...$request->all(),
            'user_id' => Auth::id(),
            'date' => now()->addDays(7), // Default date
        ]);

        // Award karma to organizer
        $event->organizer->karmaLogs()->create([
            'points' => $request->karma_reward,
            'reason' => 'Event Hosting',
            'source_type' => Event::class,
            'source_id' => $event->id,
        ]);

        return $event;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
