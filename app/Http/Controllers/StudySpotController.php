<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\StudySpot;
use Illuminate\Http\Request;

class StudySpotController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $spots = StudySpot::query()
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->when($q, function ($query) use ($q) {
    $m = metaphone($q);

    $query->where(function ($sub) use ($q, $m) {
        $sub->where('building', 'like', "%{$q}%")
            ->orWhere('metaphone', $m);
    });
})
            ->orderBy('building')
            ->get();

        return view('study-spots.index', compact('spots', 'q'));
    }

    public function store(Request $request)
    {

StudySpot::create([
    'user_id' => auth()->id(),
    'campus_id' => $campus->id,
    'building' => $data['building'],
    'floor' => $data['floor'] ?? 'N/A',
    'room_area_name' => $data['room_area_name'] ?? 'Main Area',
    'metaphone' => metaphone($data['building']),
]);

        $data = $request->validate([
            'building' => ['required', 'string', 'max:255'],
        ]);

        $campus = Campus::firstOrCreate(
            ['name' => 'UBC Vancouver'],
            ['city' => 'Vancouver']
        );

        StudySpot::firstOrCreate([
            'campus_id' => $campus->id,
            'building' => $data['building'],
            'floor' => 'N/A',
            'room_area_name' => 'Building',
        ], [
            'metaphone' => metaphone($data['building']),
        ]);

        return redirect()->route('study-spots.index')
            ->with('status', 'Building added.');
    }

    public function edit(StudySpot $studySpot)
    {
$this->authorize('update', $studySpot);

        return view('study-spots.edit', compact('studySpot'));
    }

    public function update(Request $request, StudySpot $studySpot)
    {
$this->authorize('update', $studySpot);

        $data = $request->validate([
            'building' => ['required', 'string', 'max:255'],
        ]);

        $studySpot->update([
            'building' => $data['building'],
            'metaphone' => metaphone($data['building']),
        ]);

        return redirect()->route('study-spots.index')
            ->with('status', 'Building updated.');
    }

    public function destroy(StudySpot $studySpot)
    {
$this->authorize('delete', $studySpot);

        $studySpot->delete();

        return redirect()->route('study-spots.index')
            ->with('status', 'Building deleted.');
    }

public function show(StudySpot $studySpot)
{
    $studySpot->load(['reviews.user']);

    return view('study-spots.show', [
        'spot' => $studySpot,
    ]);
}

}