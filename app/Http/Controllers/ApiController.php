<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function checkResume(Request $request) {
        $filename = $request->query('original_name');

        if (!$filename) {
            return response()->json(['error' => 'Filename is required'], 400);
        }

        $exist = Resume::where('original_name', $filename)->exists();

        return response()->json(['exists' => $exist]);
    }
}
