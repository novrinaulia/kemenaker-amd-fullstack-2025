@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Tambah Hewan</h1>

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('pet.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Pemilik</label>
                <select class="form-control" name="owner_id">
                    @foreach($owner as $o)
                    <option value="{{ $o->id }}">{{ $o->name }} ({{ $o->phone }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Input Hewan</label>
                <input class="form-control" name="pet_input" placeholder="Milo Kucing 2Th 4.5kg">
            </div>

            <button class="btn btn-primary">Simpan</button>

        </form>

    </div>
</div>

@endsection
