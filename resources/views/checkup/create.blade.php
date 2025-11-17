@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Tambah Pemeriksaan</h1>

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('checkup.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Hewan</label>
                <select class="form-control" name="pet_id">
                    @foreach($pet as $p)
                    <option value="{{ $p->id }}">{{ $p->name }} ({{ $p->owner->name }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Jenis Perawatan</label>
                <select class="form-control" name="treatment_id">
                    @foreach($treatment as $t)
                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Catatan</label>
                <textarea class="form-control" name="notes"></textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>

        </form>

    </div>
</div>

@endsection
