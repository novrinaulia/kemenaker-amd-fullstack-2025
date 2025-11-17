@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Perawatan</h1>

<div class="card shadow">
    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('treatment.update', $treatment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Perawatan</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $treatment->name) }}" required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('treatment.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>
@endsection
