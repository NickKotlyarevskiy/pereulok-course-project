<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EstimateController extends Controller
{
    public function index(Request $request): View
    {
        $values = $request->validate([
            'distance' => ['nullable', 'numeric', 'min:0.2', 'max:30'],
            'pace' => ['nullable', 'numeric', 'min:2', 'max:7'],
            'pause' => ['nullable', 'integer', 'min:0', 'max:180'],
        ]);

        $result = null;

        if (isset($values['distance'], $values['pace'], $values['pause'])) {
            $walkingMinutes = (int) ceil(((float) $values['distance'] / (float) $values['pace']) * 60);
            $totalMinutes = $walkingMinutes + (int) $values['pause'];

            $result = [
                'walking' => $walkingMinutes,
                'pause' => (int) $values['pause'],
                'total' => $totalMinutes,
                'hours' => intdiv($totalMinutes, 60),
                'minutes' => $totalMinutes % 60,
            ];
        }

        return view('estimate', [
            'values' => [
                'distance' => $values['distance'] ?? '4.2',
                'pace' => $values['pace'] ?? '4.5',
                'pause' => $values['pause'] ?? '10',
            ],
            'result' => $result,
        ]);
    }
}
