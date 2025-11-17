@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Perawatan</h1>

<div class="card shadow">
    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('treatment.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Perawatan</label>
                <input type="text" name="name" class="form-control" placeholder="Contoh: VAKSIN"
                       value="{{ old('name') }}" required>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('treatment.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>
@endsection
