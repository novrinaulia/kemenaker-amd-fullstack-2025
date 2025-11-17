@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Tambah Pemilik</h1>

<div class="card shadow">
    <div class="card-body">

        <form method="POST" action="{{ route('owner.store') }}">
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label>Telepon</label>
                <input class="form-control" name="phone" required>
            </div>

            <div class="form-group">
                <label>Verifikasi</label>
                <select class="form-control" name="phone_verified">
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                </select>
            </div>

            <button class="btn btn-primary">Simpan</button>
        </form>

    </div>
</div>

@endsection
