<?php

namespace App\Http\Controllers;

use App\Models\CvFree;
use App\Models\CvService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CvDownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('throttle:30,1');
    }

    /**
     * Download a free CV file.
     *
     * @throws AuthorizationException
     */
    public function downloadFreeCv(string $id): StreamedResponse
    {
        $cv = CvFree::findOrFail($id);

        // Authorization: Only the owner can download their CV
        if ($cv->user_id !== auth()->id()) {
            throw new AuthorizationException('Unauthorized access to this CV');
        }

        return $this->streamFile($cv->cv_file);
    }

    /**
     * Download a paid CV file.
     *
     * @throws AuthorizationException
     */
    public function downloadCvService(string $id): StreamedResponse
    {
        $cv = CvService::findOrFail($id);

        // Authorization: Only the owner can download their CV
        if ($cv->user_id !== auth()->id()) {
            throw new AuthorizationException('Unauthorized access to this CV');
        }

        return $this->streamFile($cv->cv_file);
    }

    /**
     * Stream a file from secure storage.
     */
    private function streamFile(string $fileName): StreamedResponse
    {
        $filePath = "CVs/{$fileName}";

        // Verify file exists
        if (!Storage::disk('private')->exists($filePath)) {
            abort(404, 'File not found');
        }

        // Get file info
        $mimeType = 'application/pdf';
        $size = Storage::disk('private')->size($filePath);

        return response()->stream(
            function () use ($filePath) {
                echo Storage::disk('private')->get($filePath);
            },
            200,
            [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'attachment; filename="' . basename($filePath) . '"',
                'Content-Length' => $size,
            ]
        );
    }
}
