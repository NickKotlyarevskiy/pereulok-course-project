<?php

namespace App\Http\Controllers;

use App\Models\Walk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class WalkController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'district' => ['nullable', 'string', 'max:80'],
            'max_minutes' => ['nullable', 'integer', 'min:20', 'max:360'],
            'difficulty' => ['nullable', Rule::in(['лёгкий', 'средний'])],
        ]);

        $query = Walk::query();

        if (!empty($filters['district'])) {
            $query->where('district', $filters['district']);
        }

        if (!empty($filters['max_minutes'])) {
            $query->where('duration_minutes', '<=', $filters['max_minutes']);
        }

        if (!empty($filters['difficulty'])) {
            $query->where('difficulty', $filters['difficulty']);
        }

        return view('walks.index', [
            'walks' => $query->orderBy('duration_minutes')->paginate(6)->withQueryString(),
            'districts' => Walk::query()->select('district')->distinct()->orderBy('district')->pluck('district'),
            'filters' => $filters,
        ]);
    }

    public function show(Walk $walk): View
    {
        $relatedWalks = Walk::query()
            ->where('id', '!=', $walk->id)
            ->where('district', $walk->district)
            ->orderBy('duration_minutes')
            ->take(2)
            ->get();

        return view('walks.show', compact('walk', 'relatedWalks'));
    }
}
