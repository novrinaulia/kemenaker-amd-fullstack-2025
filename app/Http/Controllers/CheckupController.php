<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Checkup;
use App\Models\Treatment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckupController extends Controller
{
    public function index()
    {
        $checkup = Checkup::with(['pet','treatment'])
            ->latest()
            ->paginate(10);

        return view('checkup.index', compact('checkup'));
    }

    public function create()
    {
        return view('checkup.create', [
            'pet' => Pet::with('owner')->get(),
            'treatment' => Treatment::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required',
            'treatment_id' => 'required',
            'notes' => 'nullable',
        ]);

        Checkup::create($request->all());
        return redirect()->route('checkup.index');
    }
}
