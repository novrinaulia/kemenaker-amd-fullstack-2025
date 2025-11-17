@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Edit Pemilik</h1>

<div class="card shadow">
    <div class="card-body">

        <form method="POST" action="{{ route('owner.update', $owner->id) }}">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Nama</label>
                <input class="form-control" name="name" value="{{ $owner->name }}" required>
            </div>

            <div class="form-group">
                <label>Telepon</label>
                <input class="form-control" name="phone" value="{{ $owner->phone }}" required>
            </div>

            <div class="form-group">
                <label>Verifikasi</label>
                <select class="form-control" name="phone_verified">
                    <option value="0" {{ $owner->phone_verified ? '' : 'selected' }}>Tidak</option>
                    <option value="1" {{ $owner->phone_verified ? 'selected' : '' }}>Ya</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
        </form>

    </div>
</div>

@endsection
