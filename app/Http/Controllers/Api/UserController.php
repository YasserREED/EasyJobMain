<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Get current user profile.
     */
    public function profile(Request $request): UserResource
    {
        return new UserResource($request->user()->load('userInfo', 'cvServices', 'freeCv'));
    }

    /**
     * Update user profile.
     */
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $request->user()->update($validated);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => new UserResource($request->user()),
        ]);
    }
}
