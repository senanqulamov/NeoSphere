<?php

namespace App\Http\Controllers;

use App\Models\Sphere;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class SphereController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return Sphere::with('coreHub', 'categories')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:public,private',
            'core_hub_id' => 'nullable|exists:core_hubs,id',
        ]);

        return Sphere::create([
            ...$request->all(),
            'user_id' => Auth::user()->id,
        ]);
    }

    public function show(Sphere $sphere)
    {
        return $sphere->load('categories', 'coreHub');
    }

    public function update(Request $request, Sphere $sphere)
    {
        $this->authorize('update', $sphere);

        $sphere->update($request->validate([
            'name' => 'string',
            'type' => 'in:public,private',
        ]));

        return $sphere;
    }

    public function destroy(Sphere $sphere)
    {
        $this->authorize('delete', $sphere);
        $sphere->delete();
        return response()->noContent();
    }
}
