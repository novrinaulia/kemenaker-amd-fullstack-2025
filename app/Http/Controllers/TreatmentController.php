<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatment = Treatment::all();
        return view('treatment.index', compact('treatment'));
    }

    public function create()
    {
        return view('treatment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:treatments,name'
        ]);

        Treatment::create([
            'name' => strtoupper($request->name)
        ]);

        return redirect()->route('treatment.index');
    }

    public function edit(Treatment $treatment)
    {
        return view('treatment.edit', compact('treatment'));
    }

    public function update(Request $request, Treatment $treatment)
    {
        $request->validate([
            'name' => 'required|unique:treatments,name,' . $treatment->id,
        ]);

        $treatment->update([
            'name' => strtoupper($request->name)
        ]);

        return redirect()->route('treatment.index');
    }

    public function destroy(Treatment $treatment)
    {
        $treatment->delete();
        return redirect()->route('treatment.index');
    }
}
