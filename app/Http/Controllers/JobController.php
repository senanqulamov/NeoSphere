<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Add this import
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    use AuthorizesRequests; // Ensure this trait is used

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Job::with('sphere', 'creator')->open()->paginate();
    }

    public function complete(Job $job)
    {
        $this->authorize('complete', $job);

        $job->update(['status' => 'closed']);

        // Award karma to worker
        if (Auth::check()) {
            Auth::user()->karmaLogs()->create([
                'points' => $job->karma_reward,
                'reason' => 'Job Completion: ' . $job->title,
                'source_type' => Job::class,
                'source_id' => $job->id,
            ]);
        }

        return response()->json(['message' => 'Job marked complete']);
    }

    public function reopen(Job $job)
    {
        $this->authorize('reopen', $job);

        $job->update(['status' => 'open']);

        // Deduct karma from user
        if (Auth::check()) {
            Auth::user()->karmaLogs()->create([
                'points' => -$job->karma_penalty,
                'reason' => 'Job Reopened: ' . $job->title,
                'source_type' => Job::class,
                'source_id' => $job->id,
            ]);
        }

        return response()->json(['message' => 'Job reopened successfully']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
