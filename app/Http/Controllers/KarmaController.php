<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KarmaController extends Controller
{
    public function earn(Request $request)
    {
        $user = User::find($request->user()->id);
        $user->karma += $request->input('karma');
        $user->save();

        return response()->json($user);
    }
}
