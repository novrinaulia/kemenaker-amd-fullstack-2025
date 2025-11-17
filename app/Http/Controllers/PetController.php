<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pet;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::with('owner')->latest()->paginate(10);
        return view('pet.index', compact('pet'));
    }

    public function create()
    {
        // hanya pemilik dengan phone_verified = 1
        $owner = Owner::where('phone_verified', 1)->get();
        return view('pet.create', compact('owner'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'pet_input' => 'required|string',
        ]);

        // 1. BERSIHKAN SPASI BERLEBIHAN
        $input = preg_replace('/\s+/', ' ', trim($request->pet_input));

        // 2. PECAH MENJADI BAGIAN
        $parts = explode(' ', $input);

        if (count($parts) < 4) {
            return back()->withErrors(['pet_input' => 'Format input tidak sesuai. Harus: Nama Jenis Usia Berat']);
        }

        $nameRAW   = $parts[0];         // Milo
        $speciesRAW = $parts[1];        // Kucing
        $ageRAW    = $parts[2];         // 2Th / 2THN / 2tahun
        $weightRAW = $parts[3];         // 4.5kg / 4,5KG

        // 3. NAMA & JENIS → UPPERCASE
        $name = strtoupper($nameRAW);
        $species = strtoupper($speciesRAW);

        // 4. BACA FORMAT USIA
        // berbagai format: 2th, 2tahun, 2Thn, 2TH, 2Tahun
        preg_match('/(\d+)/', $ageRAW, $ageMatch);

        if (!isset($ageMatch[1])) {
            return back()->withErrors(['pet_input' => 'Format usia tidak valid']);
        }

        $age = intval($ageMatch[1]);

        // 5. BERSIHKAN FORMAT BERAT
        // format bisa 4.5kg, 4,5KG, 4.5 KG
        $weightNormalized = str_replace(',', '.', $weightRAW);
        preg_match('/([\d\.]+)/', $weightNormalized, $weightMatch);

        if (!isset($weightMatch[1])) {
            return back()->withErrors(['pet_input' => 'Format berat tidak valid']);
        }

        $weight = floatval($weightMatch[1]);

        // 6. VALIDASI: hewan dengan nama + jenis yang sama tidak boleh dimiliki owner yang sama
        $exists = Pet::where('owner_id', $request->owner_id)
            ->where('name', $name)
            ->where('species', $species)
            ->exists();

        if ($exists) {
            return back()->withErrors(['pet_input' =>
                'Pemilik sudah memiliki hewan dengan nama dan jenis yang sama.'
            ]);
        }

        // 7. GENERATE KODE HEWAN
        // Format: HHMMXXXXYYYY
        // HHMM = waktu
        $time = Carbon::now()->format('Hi');

        // XXXX = id owner (4 digit left-pad)
        $ownerCode = str_pad($request->owner_id, 4, '0', STR_PAD_LEFT);

        // YYYY = nomor urut hewan
        $count = Pet::count() + 1;
        $petNumber = str_pad($count, 4, '0', STR_PAD_LEFT);

        $code = $time . $ownerCode . $petNumber;

        // pastikan unik
        while (Pet::where('code', $code)->exists()) {
            $count++;
            $petNumber = str_pad($count, 4, '0', STR_PAD_LEFT);
            $code = $time . $ownerCode . $petNumber;
        }

        // 8. SIMPAN DATA
        Pet::create([
            'code' => $code,
            'owner_id' => $request->owner_id,
            'name' => $name,
            'species' => $species,
            'age' => $age,
            'weight' => $weight,
        ]);

        return redirect()->route('pet.index');
    }

    public function edit(Pet $pet)
    {
        $owners = Owner::where('phone_verified', 1)->get();
        return view('pet.edit', compact('pet', 'owners'));
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id'
        ]);

        // hanya boleh update owner
        $pet->update([
            'owner_id' => $request->owner_id
        ]);

        return redirect()->route('pet.index');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pet.index');
    }
}
