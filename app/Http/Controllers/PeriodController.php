<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PeriodController extends Controller
{
    public function index(Request $request)
    {
        $periods = $request->user()->periods()->orderBy('start_date', 'desc')->get();
        return view('periods.index', compact('periods'));
    }

    public function create()
    {
        return view('periods.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'symptoms' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $request->user()->periods()->create($validated);
        return redirect()->route('periods.index')->with('status', 'Cycle logged successfully!');
    }

    public function edit(Period $period)
    {
        Gate::authorize('update', $period);
        return view('periods.edit', compact('period'));
    }

    public function update(Request $request, Period $period)
    {
        Gate::authorize('update', $period);

        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'symptoms' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $period->update($validated);
        return redirect()->route('periods.index')->with('status', 'Cycle updated successfully!');
    }

    public function destroy(Period $period)
    {
        Gate::authorize('delete', $period);
        $period->delete();
        return redirect()->route('periods.index')->with('status', 'Log deleted.');
    }
}
