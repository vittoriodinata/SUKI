<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    // Display all competitions
    public function index(Request $request)
    {
        $competitions = Competition::with([
            'category',
            'organizer'
        ])
        ->when($request->search, function ($query, $search) {
            $query->where('competition_name', 'like', "%{$search}%");
        })
        ->when($request->category_id, function ($query, $categoryId) {
            $query->where('category_id', $categoryId);
        })
        ->when($request->status, function ($query, $status) {
            $query->where('status', $status);
        })
        ->orderBy('registration_deadline', 'asc')
        ->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'Competition data retrieved successfully.',
            'data' => $competitions
        ]);
    }

    // Display competition detail
    public function show($id)
    {
        $competition = Competition::with([
            'category',
            'organizer',
            'requirements'
        ])->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Competition detail retrieved successfully.',
            'data' => $competition
        ]);
    }
}