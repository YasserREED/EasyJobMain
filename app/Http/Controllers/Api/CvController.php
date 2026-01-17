<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CvServiceResource;
use App\Models\CvService;
use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Get all CVs for the authenticated user.
     */
    public function index(Request $request)
    {
        $cvs = CvService::forUser($request->user()->id)
            ->with('user')
            ->latest()
            ->paginate(15);

        return CvServiceResource::collection($cvs);
    }

    /**
     * Get a specific CV by ID.
     */
    public function show(Request $request, string $id): CvServiceResource
    {
        $cv = CvService::findOrFail($id);

        // Authorization
        if ($cv->user_id !== $request->user()->id) {
            abort(403, 'Unauthorized');
        }

        return new CvServiceResource($cv->load('user'));
    }

    /**
     * Create a new CV service.
     */
    public function store(Request $request)
    {
        // Use the form request validation
        // This is a basic example - adjust based on your actual needs

        abort(403, 'This endpoint requires proper implementation');
    }
}
